<style>
    html {
        overflow: hidden; /* This prevents scrolling past the content */
    }
</style>

<?php include_once 'head.php';?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'menu.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once 'topbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php pageContent();?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once 'footer.php';?>

            <script>
                // Select the toggle button and the sidebar
                const sidebarToggleTop = document.getElementById('sidebarToggleTop');
                const accordionSidebar = document.getElementById('accordionSidebar');

                // Add an event listener to the toggle button
                sidebarToggleTop.addEventListener('click', function () {
                    // Toggle the d-none class on the sidebar
                    accordionSidebar.classList.toggle('d-none');
                });

            </script>