
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white fixed-top" data-aos="zoom-in-down">
    <div class="container">
    <a class="navbar-brand" href="index.php"><img src="images/logoArit.png" height="65"></a>
    Green Libery
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> หน้าหลัก</a>
                </li>
                <li class="nav-item ">
                <select id="categoryDropdown" class="form-control nav-link " >
                <option value="default" >&gt;&gt;&nbsp;กิจกรรม/ข่าวสาร</a></option>
                        
                        <?php 
                        $query = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></option>
                        <?php } ?>
                    </select>
                    
                    <script>
        var dropdown = document.getElementById("categoryDropdown");

        dropdown.addEventListener("mousedown", function() {
            // สำหรับคลิกแรก ซ่อนค่า default
            dropdown.options[0].style.display = "none";
        });

        dropdown.addEventListener("change", function() {
            var selectedCategoryId = this.value;
            
            // สำหรับการเลือกค่าอื่น ๆ ซ่อนค่า default
            if (selectedCategoryId && selectedCategoryId !== "default") {
                dropdown.options[0].style.display = "none";
                window.location.href = "category.php?catid=" + selectedCategoryId;
            }
        });
    </script>
            </li>
                <li class="nav-item ml-auto ">
                    <a class="nav-link " href="file.php"><i class="mdi-library-books"></i>เอกสาร</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="about-us.php"><i class="fa fa-info-circle"></i> เกี่ยวกับ</a>
                </li>
                <li class="nav-item ml-auto ">
                    <a class="nav-link " href="contact-us.php"><i class="fa fa-phone"></i> ติดต่อ</a>
                </li>
                
                
            </ul>
        </div>
        
    </div>
</nav>
