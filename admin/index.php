<?php
    session_start();
    // this is echo header of layout 
    include '../layout/index.php';
    // this is for check user 
    include '../php/checkuser/index.php';
    admin(getBaseUrl('login/'));
    // this is echo header 
    head('Admin','
    <style>
        @media only screen and (max-width: 600px) {
            .my-story-body {
                margin-top: 70px;
            }
        }
    </style>
    ');

    // this is get get data post
    include '../php/dbcon/index.php';
    $sql = "SELECT * FROM posts order by id DESC";
    $result = $conn->query($sql);
?>
    <!-- this is form for add new item  -->
    <div class="web-form" id="content-form">
        <form action="<?=getBaseUrl('php/model/post.php')?>" method="post" class="db-c" enctype="multipart/form-data">
            <input type="text" name="action" value="POST" hidden>
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <h2><span></span></h2>
                    <a><span>បង្កើតមាតិការ</span></a>
                    <div class="icon-ra icon-sm df-c"
                        onclick="document.querySelector('#content-form').classList.toggle('web-form-active')">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <!-- this is content  -->
                <div class="con db-c">
                    <div class="con-body db-c">
                        <div class="form-head"></div>     
                        <!-- this is content  -->
                        <div class="main scroll-y" id="taget-height">
                            <div class="box">
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">ចំណងជើង</label>
                                    <div class="txt-title-box">
                                        <input type="text" required name="title" placeholder="បញ្ចូលចំណងជើងមាតិការ">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" required id="txt-photo" hidden="" name="img" accept=".jpg,.png,.jpeg,.web"
                                    onchange="previewImage(event,'.soeng_content')">
                                <div class="txt-photo df-c" onclick="document.querySelector('#txt-photo').click()">
                                    <div class="txt-photo-box soeng_content" id="#">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li>
                                                <h2>បញ្ចូលរូបភាពមាតិកា</h2>
                                            </li>
                                            <li>
                                                <p>ទំហំរូបភាព២០៤៨</p>
                                            </li>
                                        </ul>
                                        <img src="#" class="img-c" alt="soeng">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">ចំណងជើងធំ</label>
                                    <div class="txt-title-box">
                                        <input type="text" name="main_title" placeholder="បញ្ចូលចំណងជើងធំ">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title bottom-05">
                                    <label for="#">ស្លាកសញ្ញា</label>
                                    <div class="txt-title-box">
                                        <input type="text" name="hastag" placeholder="បញ្ចូលស្លាកសញ្ញា">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title bottom-05">
                                    <label for="#">ឯកសារ</label>
                                    <div class="txt-title-box df-l">
                                        <input required type="file" name="file" accept=".html">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot">
                            <div class="foot-body df-s">
                                <h2>ជ្រើសរើសលខ្ខណៈបង្កើត</h2>
                                <ul class="df-c">
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'បញ្ជីចាក់'"
                                        onclick="activateWebForm('#playlist-form')"><i class="fa-solid fa-list"></i></li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'បន្ថែម'"
                                        onclick="activateWebForm('#book-content')"><i class="fa-solid fa-ellipsis"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is footer form  -->
                <div class="submit-form">
                    <div class="box df-c">
                        <button class="btn icon-ra" type="submit">បង្ហោះមាតិការ</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="form-b" onclick="document.querySelector('#content-form').classList.toggle('web-form-active')"></div>
    </div>
    <!-- this is content  -->
    <main class="web-main over-h">
        <!-- this is my story  -->
        <section class="my-story">
            <div class="my-story-body">
                <div class="box">
                    <ul>
                        <?php
                        foreach ($result as $item) { ?>
                        <li style="--bg-img: url('<?=getBaseUrl('upload/'.$item['img'])?>');"
                        onclick="location.href='<?=getBaseUrl('php/model/post.php?post='.$item['id'])?>'">
                            <div class="image">
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
            <!-- <div class="default-footer df-c">
                <div class="con">
                    <div class="main df-c">
                        <a href="#" class="btn icon icon-ra">
                            <span>Explore more</span>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div> -->
        </section>
    </main>
    <!-- this is button for open form create new item  -->
    <div class="main-btn-create" onclick="document.querySelector('#content-form').classList.toggle('web-form-active')">
        <div class="btn icon icon-ra">
            <i class="fa-solid fa-plus"></i>
            <span>Create new</span>
        </div>
    </div>
    <script src="../js/insert_img.js"></script>
    <!-- <script src="../js/responsive_form.js"></script> -->
</body>
</html>