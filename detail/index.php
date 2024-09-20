<?php
    include '../php/checkuser/index.php';
    if(!isset($_GET['post'])){
        echo "<h2 style='min-height: 90vh;display: flex;align-items: center;justify-content: center;'>Page not found 004</h2>";
        return;
    } 
    include '../php/dbcon/index.php';//for use get data 
    include '../layout/index.php';//user layout for webpage
    // this is for get data from database
    $id = $_GET['post'];
    $sql = "SELECT * FROM posts WHERE id ='$id'";
    $result = $conn->query($sql);
    if($result){
        $item_detail = $result->fetch_assoc();
        $main_title_sql = convertToListSql($item_detail['main_title'],'main_title');
        $hastag_sql = convertToListSql($item_detail['hastag'],'hastag');
        $sql = "SELECT * FROM posts 
            WHERE ($main_title_sql) 
            OR ($hastag_sql)";
        $foryou = $conn->query($sql);
        if(!$foryou){
            $sql = "SELECT * FROM (
                SELECT * FROM posts
                ORDER BY id DESC
                LIMIT 100
            ) AS last_100
            ORDER BY RAND()
            LIMIT 3;";
            $foryou = $conn->query($sql);
        }
    }else{
        location_back();
        return;
    }
    head($item_detail['title'],'');
?>
    <!-- this Is content of page  -->
    <main class="web-main over-h">
        <section class="get-detail">
            <?php
// <!-- ----------------------------------php------------------------------------ -->
                if(file_exists('../upload/'.$item_detail['file'])) //for use corrent url
                {
                    include '../upload/'.$item_detail['file'];
                }
            ?>
        </section>
        <!-- this is for show content suggestion  -->
        <?php
        if($foryou && $foryou->num_rows > 0){?>
        <section class="my-story">
            <div class="my-story-body">
                <div class="header default-content-header df-c">
                    <div class="con">
                        <h2>More Foryou</h2>
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
// <!-- ----------------------------------php------------------------------------ -->
                        foreach ($foryou as $item) { ?>
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
        <?php
            } 
        ?>
    </main>
</body>
</html>