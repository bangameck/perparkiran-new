<!-- /**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/ -->
<li class="onhover-dropdown">
    <div class="notification-box"><i data-feather="star"></i></div>
    <div class="onhover-show-div bookmark-flip">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="front">
                    <ul class="droplet-dropdown bookmark-dropdown">
                        <li class="gradient-primary"><i data-feather="star"></i>
                            <h6 class="f-18 mb-0">Bookmark</h6>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-4 text-center"><i data-feather="file-text"></i>
                                </div>
                                <div class="col-4 text-center"><i data-feather="activity"></i>
                                </div>
                                <div class="col-4 text-center"><i data-feather="users"></i>
                                </div>
                                <div class="col-4 text-center"><i data-feather="clipboard"></i>
                                </div>
                                <div class="col-4 text-center"><i data-feather="anchor"></i>
                                </div>
                                <div class="col-4 text-center"><i data-feather="settings"></i>
                                </div>
                            </div>
                        </li>
                        <li class="text-center">
                            <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                        </li>
                    </ul>
                </div>
                <div class="back">
                    <ul>
                        <li>
                            <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                                <input type="text" placeholder="search...">
                            </div>
                        </li>
                        <li>
                            <button class="d-block flip-back" id="flip-back">Back</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>