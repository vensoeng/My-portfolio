<?php
    include '../php/checkuser/index.php';
    if(!isset($_GET['post'])){
        echo "<h2 style='min-height: 90vh;display: flex;align-items: center;justify-content: center;'>Page not found 004</h2>";
        return;
    } 
    include '../php/dbcon/index.php';//for use get data 
    include '../layout/index.php';//user layout for webpage
    // this is for get data from database
    $text_title = convertToListSql($_GET['post'],'main_title');
    $text_hastag = convertToListSql($_GET['post'],'hastag');
    $sql = "SELECT * FROM posts 
            WHERE ($text_title) 
            OR ($text_hastag)";
    $result = $conn->query($sql);
    if(!$result){
        echo "<h2 style='min-height: 90vh;display: flex;align-items: center;justify-content: center;'>Sorry I am Error query data😥</h2>";
        return;
    }
    head('Search','
    <style>
        .my-story-body .box ul{
            min-height: 100vh;
        }
        .my-story-body .default-content-header h2{
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .my-story-body {
                margin-top: 70px;
            }
            .my-story-body .default-content-header h2 {
               display: block;
               font-size: 10vw;
            }
        }
        @media only screen and (max-width: 500px){
            .my-story-body .default-content-header h2 {
               font-size: 7vw;
            }
        }
    </style>
    ');
?>
    <!-- this is content  -->
    <main class="web-main over-h">
        <!-- this is my story  -->
        <section class="my-story">
            <div class="my-story-body">
                <div class="header default-content-header df-c">
                    <div class="con">
                        <h2 data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="1500">
                            You search "<?=$_GET['post']?>"
                        </h2>
                        <div class="main-btn df-c">
                            <a href="<?=getBaseUrl('')?>" class="btn icon icon-ra">
                                <i class="fa-solid fa-arrow-left-long right-05" style="margin-left: 0rem;"></i>
                                <span>Back to home</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <ul style="<?=$result->num_rows == 0 ? 'display: flex;align-items: center;justify-content: center;' : ''?>">
                    <?php
// <!-- ----------------------------------php------------------------------------ -->
                    if($result->num_rows == 0){ ?>
                        <li class="df-c">
                            <h2 style="color: var(--fds-grayBgNotisvictionBgArticaltow);font-size: 1.3rem;font-family: var(--sg-fontbrand);">Result not found</h2>
                        </li>
                    <?php }

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
    <!-- this IS aos animation  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- this is start aos  -->
    <script>
        AOS.init();
    </script>
</body>
</html>