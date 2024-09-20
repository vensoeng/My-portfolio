<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VenSoeng - Edit</title>
    <!-- this is favicon  -->
    <link rel="shortcut icon" href="<?=getBaseUrl('')?>images/favicon.png?v=<?=time()?>" type="image/x-icon">
    <!-- this is main css  -->
    <link rel="stylesheet" href="<?=getBaseUrl('')?>css/main.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=getBaseUrl('')?>css/dashbaord.css?v=<?=time()?>">
    <!-- this is for icon  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @media only screen and (max-width: 600px) {
            .my-story-body {
                margin-top: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="web-form web-form-active" id="content-form">
        <form action="<?=getBaseUrl('php/model/post.php')?>" method="POST" class="db-c" enctype="multipart/form-data">
            <input type="text" name="action" value="PUT" hidden>
            <input type="text" name="id" value="<?=$item->id?>" hidden>
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <div class="icon-ra icon-sm df-c left-05"
                    onclick="history.back()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <a><span>បង្កើតមាតិការ</span></a>
                    <h2><span></span></h2>
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
                                        <input type="text" value="<?=$item->title?>" name="title" placeholder="បញ្ចូលចំណងជើងមាតិការ">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="txt-photo" hidden="" name="img" accept=".jpg,.png,.jpeg,.web"
                                onchange="previewImage(event,'.soeng_content')">
                                <div class="txt-photo df-c" onclick="document.querySelector('#txt-photo').click()">
                                    <div class="txt-photo-box soeng_content txt-photo-box-active" id="#">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li>
                                                <h2>បញ្ចូលរូបភាពមាតិកា</h2>
                                            </li>
                                            <li>
                                                <p>ទំហំរូបភាព២០៤៨</p>
                                            </li>
                                        </ul>
                                        <img src="<?=getBaseUrl('upload/'.$item->img)?>" class="img-c" alt="soeng">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">ចំណងជើងធំ</label>
                                    <div class="txt-title-box">
                                        <input type="text" value="<?=$item->main_title?>" name="main_title" placeholder="បញ្ចូលចំណងជើងធំ">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title bottom-05">
                                    <label for="#">ស្លាកសញ្ញា</label>
                                    <div class="txt-title-box">
                                        <input type="text" value="<?=$item->hastag?>" name="hastag" placeholder="បញ្ចូលស្លាកសញ្ញា">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title bottom-05">
                                    <label for="#">ឯកសារ</label>
                                    <div class="txt-title-box df-l">
                                        <input type="file" name="file" accept=".html">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot">
                            <div class="foot-body df-s">
                                <h2>ជ្រើសរើសលខ្ខណៈបង្កើត</h2>
                                <ul class="df-c">
                                    <a 
                                    onclick="return confirm('Are you sure you want to delete this item?');" 
                                    href="<?= getBaseUrl('php/model/post.php?delete=' . $item->id) ?>" 
                                    class="icon icon-ra-sm text-be" style="--text-: 'លុបអត្ថបទ'">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'មើលអត្ថបទ'" onclick="location.href='../detail/'">
                                        <i class="fa-regular fa-eye"></i>
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
    </div>
    <script src="<?=getBaseUrl('')?>/js/insert_img.js?v=<?time()?>"></script>
</body>
</html>