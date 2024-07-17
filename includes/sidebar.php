
<div class="col-md-3 " data-aos="zoom-in-down">
    <!-- Search Widget -->
    <!-- <h4 class="widget-title mb-5">Don't <span>Miss</span></h4> -->

    <div class="card mb-4 border-0">
       
        <div class="card-body">
            <form name="search" action="search.php" method="post">
                <div class="input-group">
                    
                    
            </form>
        </div>
    </div>
</div>



<!-- Side Widget -->
<div class="card my-4 border-0" data-aos="zoom-in-down">
    <h5 class="card-header border-0 bg-white">กิจกรรมล่าสุด</h5>
    <div class="card-body">
        <ul class="mb-0 list-unstyled">
            <?php
               $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostImage,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
               while ($row=mysqli_fetch_array($query)) {
               
               ?>
            <li class="d-flex mb-2 align-items-center">
                <img class="mr-2 rounded-circle" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" width="50px" height="50px">
                <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="text-dark font-weight-bold"><?php echo htmlentities($row['posttitle']);?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>


<!-- Side Widget -->




<!-- Side Widget -->




<div data-aos="zoom-in-down">
<h5 class="card-header border-0 bg-transparent">วิดีโอที่เกี่ยวข้อง</h5>
<div class="card my-4 border-0">
<div class="embed-responsive embed-responsive-16by9">
                <iframe width="914" height="514" src="https://www.youtube.com/embed/gcMcrXYT5lA" title="สัมภาษณ์และบรรยากาศ ณ สำนักวิทยบริการและเทคโนโลยีสารสนเทศ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
</div>

<div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LPMhxHD2Q7o" frameborder="0"  allowfullscreen></iframe>
                </div>

<div class="card my-4 border-0">
<div class="embed-responsive embed-responsive-16by9">
<iframe width="914" height="514" src="https://www.youtube.com/embed/V-2tLlEMD3U" title="Library Review NPRU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
</div>
</div>



</div>
</div>