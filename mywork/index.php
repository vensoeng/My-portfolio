<?php
    include '../php/dbcon/index.php';//for use get data 
    include '../layout/index.php';//user layout for webpage
    head('My work','');
?>
    <main class="web-main over-h">
        <!-- this is my story  -->
        <section class="my-story">
            <div class="my-story-body">
                <div class="header default-content-header df-c">
                    <div class="con">
                        <h2 data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">My Story Highlight</h2>
                        <div class="main-btn df-c">
                            <a href="<?=getBaseUrl('')?>" class="btn icon icon-ra">
                                <i class="fa-solid fa-arrow-left-long right-05" style="margin-left: 0rem;"></i>
                                <span>Back Home</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <ul>
                        
                    <?php
// <!-- ------------------------------this is php for echo data form database ------------------------ -->
                        $sql = "SELECT * FROM posts order by id DESC";
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
</body>
</html>