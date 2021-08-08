<?php
declare (strict_types = 1);

/*
 * This file is part of PHP-FFmpeg.
 *
 * (c) Strime <contact@strime.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FFMpeg\Media;

use Alchemy\BinaryDriver\Exception\ExecutionFailureException;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Driver\FFMpegDriver;
use FFMpeg\Exception\RuntimeException;
use FFMpeg\FFProbe;
use FFMpeg\Filters\Gif\GifFilterInterface;
use FFMpeg\Filters\Gif\GifFilters;

class Gif extends AbstractMediaType implements IVideoOwned
{
    use TVideoOwned;

    /** @var TimeCode */
    private $timecode;
    /** @var Dimension */
    private $dimension;
    /** @var int */
    private $duration;
    /** @var Video */
    private $video;

    public function __construct(Video $video, FFMpegDriver $driver, FFProbe $ffprobe, TimeCode $timecode, Dimension $dimension, $duration = null)
    {
        parent::__construct($video->getPathfile(), $driver, $ffprobe);
        $this->timecode = $timecode;
        $this->dimension = $dimension;
        $this->duration = $duration;
        $this->video = $video;
    }

    /**
     * @inheritDoc
     *
     * @return GifFilters
     */
    public function filters()
    {
        return new GifFilters($this);
    }

    /**
     * @inheritDoc
     *
     * @return Gif
     */
    public function addFilter(GifFilterInterface $filter)
    {
        $this->filters->add($filter);

        return $this;
    }

    /**
     * @return TimeCode
     */
    public function getTimeCode(): TimeCode
    {
        return $this->timecode;
    }

    /**
     * @return Dimension
     */
    public function getDimension(): Dimension
    {
        return $this->dimension;
    }

    /**
     * Saves the gif in the given filename.
     *
     * @param string  $pathfile
     *
     * @return Gif
     *
     * @throws RuntimeException
     */
    public function save(string $pathfile)
    {
        /**
         * @see http://ffmpeg.org/ffmpeg.html#Main-options
         */
        $commands = [
            '-ss', (string) $this->timecode,
        ];

        if (null !== $this->duration) {
            $commands[] = '-t';
            $commands[] = (string) $this->duration;
        }

        $commands[] = '-i';
        $commands[] = $this->pathfile;
        $commands[] = '-vf';
        $commands[] = 'scale=' . $this->dimension->getWidth() . ':-1';
        $commands[] = '-gifflags';
        $commands[] = '+transdiff';
        $commands[] = '-y';

        foreach ($this->filters as $filter) {
            $commands = array_merge($commands, $filter->apply($this));
        }

        $commands[] = $pathfile;

        try {
            $this->driver->command($commands);
        } catch (ExecutionFailureException $e) {
            $this->cleanupTemporaryFile($pathfile);
            throw new RuntimeException('Unable to save gif', $e->getCode(), $e);
        }

        return $this;
    }
}
