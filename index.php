
<!-- this Is for run migrate and check database  -->
<?php
    include 'php/dbcon/index.php';//for use get data 
    include 'php/geturl/index.php';//for use getcorren url 
    include 'layout/index.php';//user layout for webpage
    head('Home','');
?>
<!-- -------------------//------------------------------  -->
    <!-- this Is content of page  -->
    <main class="web-main over-h">
        <!-- this is intore  -->
        <div class="web-show">
            <div class="web-show-body">
                <div class="box">
                    <div class="text">
                        <!-- <h2>
                            Solutions with Laravel and Flutter<br>
                            Specializing in web-App
                        </h2> -->
                        <h2 data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="1500">
                            With Laravel and Flutter<br>
                            Specializing web-App
                        </h2>
                        <div class="main-btn df-c" data-aos="flip-left" data-aos-duration="1100">
                            <a href="<?=getBaseUrl('/mywork')?>" class="btn icon-ra">
                                <span>Explore more</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- this is show about me  -->
        <div class="web-me db-s">
            <div class="web-me-body db-c">
                <div class="box" data-aos="fade-top" data-aos-offset="100" data-aos-anchor-placement="top-bottom">
                    <div class="row df-c">
                    <div class="con">
                            <h2>
                                Let's get know<br>
                                about me.
                            </h2>
                            <blockquote>
                                <p>Hello! I'm VenSoeng, a passionate and dedicated developer with a strong focus on web development, mobile app development With a solid background in technologies like Laravel, Flutter, HTML, CSS, JavaScript, I enjoy creating innovative solutions that are both functional and user-friendly.</p>
                            </blockquote>
                            <div class="main-btn">
                                <a onclick="document.querySelector('.form-head').classList.add('form-head-active')" class="btn curs-p icon icon-ra curs-p">
                                    <span>Discover more about me</span>
                                </a>
                            </div>
                    </div>
                    </div>
                    <div class="row" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-offset="300" data-aos-easing="ease-in-sine">
                        <div class="con">
                            <img class="img-c" src="images/sg.jpg"
                            loading="lazy"
                            srcset="
                            images/sg.jpg?width=100? 100w, 
                            images/sg.jpg?width=200? 200w, 
                            images/sg.jpg?width=400? 400w, 
                            images/sg.jpg?width=800? 800w, 
                            images/sg.jpg?width=1000? 1000w, 
                            images/sg.jpg?width=1200? 1200w, 
                            "
                            sizes="(max-width: 800px) 100vw, 50vw" 
                            decoding="async"
                            fetchPriority = "high"
                            effect="blur"
                            alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- this is my story  -->
        <section class="my-story">
            <div class="my-story-body">
                <div class="header default-content-header df-c">
                    <div class="con">
                        <h2 data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="1500">My Story Highlight</h2>
                        <div class="main-btn df-c">
                            <a href="<?=getBaseUrl('/mywork')?>" class="btn icon icon-ra">
                                <span>Explore more</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <ul>
                        <?php
// <!-- ----------------------------------php------------------------------------ -->
                            $sql = "SELECT * FROM posts order by id DESC LIMIT 4";
                            $result = $conn->query($sql);
                            foreach ($result as $item) { ?>
                            <li style="--bg-img: url('<?=getBaseUrl('upload/'.$item['img'])?>');"
                            data-aos="zoom-in" class="aos-init aos-animate">
                                <div class="image"
                                onclick="location.href='<?=getBaseUrl('detail/?post='.$item['id'])?>'">
                                    <img class="img-c"
                                        loading="lazy"
                                        srcset="
                                        <?=getBaseUrl('upload/'.$item['img'])?>?width=100? 100w, 
                                        <?=getBaseUrl('upload/'.$item['img'])?>?width=200? 200w, 
                                        <?=getBaseUrl('upload/'.$item['img'])?>?width=400? 400w, 
                                        <?=getBaseUrl('upload/'.$item['img'])?>?width=800? 800w, 
                                        <?=getBaseUrl('upload/'.$item['img'])?>?width=1000? 1000w, 
                                        <?=getBaseUrl('upload/'.$item['img'])?>?width=1200? 1200w, 
                                        "
                                        sizes="(max-width: 800px) 100vw, 50vw" 
                                        decoding="async"
                                        fetchPriority = "high"
                                        effect="blur"
                                    alt="">
                                </div>
                                <div class="text">
                                    <div class="title df-l"
                                    onclick="location.href='<?=getBaseUrl('detail/?post='.$item['id'])?>'">
                                        <h2><?=$item['title']?></h2>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="detail">
                                    <div class="list df-l">
                                        <strong>Main:</strong>
                                        <div class="text df-l">
                                            <?=convertToLinks($item['main_title'],getBaseUrl('search/?post='))?>
                                        </div>
                                    </div>
                                    <div class="list df-l">
                                        <strong>Hastag:</strong>
                                        <div class="text df-l">
                                            <?=convertToLinks($item['hastag'],getBaseUrl('search/?post='))?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- this is contact  -->
        <section class="web-contact">
            <div class="web-contact-body">
                <div class="header default-content-header df-c">
                    <div class="con">
                        <h2 data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="1500">My Contact Highlight</h2>
                        <div class="main-btn df-c">
                            <a href="https://t.me/seongpublichannel" class="btn icon icon-ra">
                                <span>Open Telegram</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="image" data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="300" data-aos-anchor-placement="top-bottom">
                        <img src="images/sg.jpg" class="img-c"
                            onclick="location.href='https://t.me/seongpublichannel'"
                            loading="lazy"
                            srcset="
                            images/sg.jpg?width=100? 100w, 
                            images/sg.jpg?width=200? 200w, 
                            images/sg.jpg?width=400? 400w, 
                            images/sg.jpg?width=800? 800w, 
                            images/sg.jpg?width=1000? 1000w, 
                            images/sg.jpg?width=1200? 1200w, 
                            "
                            sizes="(max-width: 800px) 100vw, 50vw" 
                            decoding="async"
                            fetchPriority = "high"
                            effect="blur"
                        alt="">
                        <img src="images/IMG_9886.jpg" class="dn"
                            onclick="location.href='https://t.me/seongpublichannel'"
                            loading="lazy"
                            srcset="
                            images/IMG_9886.jpg?width=100? 100w, 
                            images/IMG_9886.jpg?width=200? 200w, 
                            images/IMG_9886.jpg?width=400? 400w, 
                            images/IMG_9886.jpg?width=800? 800w, 
                            images/IMG_9886.jpg?width=1000? 1000w, 
                            images/IMG_9886.jpg?width=1200? 1200w, 
                            "
                            sizes="(max-width: 800px) 100vw, 50vw" 
                            decoding="async"
                            fetchPriority = "high"
                            effect="blur" 
                        alt="">
                        <ul class="df-s">
                            <li>
                                <a href="https://web.facebook.com/vensoeng" class="df-l">
                                    <i class="fa-brands fa-facebook"></i>
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/seongpublichannel" class="df-l">
                                    <i class="fa-brands fa-telegram"></i>
                                    <span>Telegram</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@vensoeng" class="df-l">
                                    <i class="fa-brands fa-tiktok"></i>
                                    <span>Tiktok</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@vsoeng" class="df-l">
                                    <i class="fa-brands fa-youtube"></i>
                                    <span>YouTube</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content">
                    <div class="text">
                        <div class="title df-l">
                            <h2>បណ្ដាញសង្គមរបស់ខ្ញុំ?</h2>
                            <span></span>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="list">
                            <strong>Main:</strong>
                            <div class="text">
                                <a href="#">About me</a>
                            </div>
                        </div>
                        <div class="list">
                            <strong>Hastag:</strong>
                            <div class="text">
                                <a href="#">Facebook</a>
                                <a href="#">YouTube</a>
                                <a href="#">Tiktok</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>