</div>      
</section>
             
           <script src="<?php echo $url ?>assests/vendor/jquery-3.3.1.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
           <script src="<?php echo $url ?>assests/vendor/bootstrap/js/bootstrap.min.js"></script>
           <script src="<?php echo $url ?>assests/vendor/data_table/jquery.dataTables.min.js"></script>
           <script src="<?php echo $url ?>assests/vendor/data_table/dataTables.bootstrap4.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
           <script src="<?php echo $url ?>assests/vendor/way_point/jquery.waypoints.js"></script>
           <script src="<?php echo $url ?>assests/vendor/counter_up/counter_up.js"></script>
           <script src="<?php echo $url ?>assests/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           <script src="<?php echo $url ?>assests/vendor/chart_js/Chart.min.js"></script>
           <script src="<?php echo $url ?>assests/js/app.js"></script>
           <script>
                let currentlocation=location.href
                $('.menu-item-link').each(function(){
                    let links=$(this).attr("href")
                    if(links==currentlocation){
                        $(this).addClass('active')
                    }
                })
           </script>
           </body>
           </html>