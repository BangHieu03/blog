<div class="user-page">
    <header class="container user-profile pt-3 pb-1 pb-lg-3">
        <div class="user-card">
            <div class="user-card__main">
                <a href="#" aria-current="page" class="position-relative d-flex flex-col justify-content-center align-items-center user-card__main__hero nuxt-link-exact-active active ">
                    <img class="avatar avatar--xxl level-default avatar-event flex-center" data-loaded="true" src="/images/<?php echo $_SESSION['user_info']['avatar']; ?>" alt="Avatar">
                </a>
                <div class="user-card__main__body">
                    <div class="user-card__main__body__username">
                        <div class="d-flex profile-name">
                            <h1 title="<?php echo $_SESSION['user_info']['name_real']; ?>" class="user-name d-inline text-break">
                                @<?php echo $_SESSION['user_info']['name_real']; ?>
                            </h1>
                        </div>
                        <h4 class="text-muted">
                            <?php echo $_SESSION['user_info']['name']; ?>
                        </h4>
                        <div></div>
                    </div>
                    <div class="user-card__main__body__action">
                        <a class="btn btn-follow" href="./index.php?pages=edit_profile&action=home" target="_blank" rel="noopener">
                            Sửa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="profile-tabs ">
        <ul class="heading-tabs horizontal-scroll container user-profile item-menu-profile ">
            <li class="heading-tabs__item active"><a href="" aria-current="page" class="heading-tabs__link">
                    Bài viết
                </a></li>
            <li class="heading-tabs__item"><a href="#" class="heading-tabs__link">
                    Bookmark
                </a></li>
            <li class="heading-tabs__item"><a href="#" class="heading-tabs__link">
                    Đang theo dõi
                </a></li>
            <li class="heading-tabs__item"><a href="#" class="heading-tabs__link">
                    Người theo dõi
                </a></li>
            <li class="heading-tabs__item"><a href="#" class="heading-tabs__link">
                    Thẻ
                </a></li>
            <li class="heading-tabs__item"><a href="./index.php?pages=page_person&action=contact" class="heading-tabs__link">
                    Liên hệ
                </a></li>
        </ul>
    </div>
</div>