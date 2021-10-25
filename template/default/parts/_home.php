<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-23T11:27:04+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _home.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T18:43:45+07:00

?>

<section id="section1 container-fluid">
    <header class="c-header">
        <div class="mask"></div>
      <?php
      // ------------------------------------------------------------------------
      // include navbar
      // ------------------------------------------------------------------------
      include '_navbar.php'; ?>
    </header>
  <?php
  // --------------------------------------------------------------------------
  // include search form part
  // --------------------------------------------------------------------------
  include '_search-form.php'; ?>
</section>

<div id="slims-home">
<section class="mt-5 container">

 <!-- FITUR COLLECTION : POIN 1 -->
    <?php include '_collection.php'; ?>
    <!-- AKHIR POIN 1 -->

    <h4 class="text-secondary text-center text-thin mt-5 mb-4"><?php echo __('Select the topic you are interested in'); ?></h4>
    <ul class="topic d-flex flex-wrap justify-content-center px-0">
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=8&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/8-books.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo __('Literature'); ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=3&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/3-diploma.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo __('Social Sciences'); ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=6&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/6-blackboard.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo __('Applied Sciences'); ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=7&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/7-quill.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo __('Art & Recreation'); ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="javascript:void(0)" class="d-flex flex-column" data-toggle="modal" data-target="#exampleModal">
                <img src="<?php echo assets('images/icon/grid_icon.png'); ?>" width="80"
                     class="mb-3 mx-auto"/>
                <?php echo __('see more..'); ?>
            </a>
        </li>
    </ul>
</section>

<?php if ($sysconf['template']['classic_popular_collection']) : ?>
<section class="mt-5 container">
    <h4 class=" mb-4">
        <?php echo __('Popular among our collections'); ?>
        <br>
        <small class="subtitle-section"><?php echo __('Our library\'s line of collection that have been favoured by our users were shown here. Look for them. Borrow them. Hope you also like them');?></small>
    </h4>

    <slims-group-subject url="index.php?p=api/subject/popular"></slims-group-subject>
    <slims-collection url="index.php?p=api/biblio/popular"></slims-collection>

</section>
<?php endif; ?>

<?php if ($sysconf['template']['classic_new_collection']) : ?>
<section class="mt-5 container">
    <h4 class=" mb-4">
        <?php echo __('New collections + updated');?>
        <br>
        <small class="subtitle-section"><?php echo __('These are new collections list. Hope you like them. Maybe not all of them are new. But in term of time, we make sure that these are fresh from our processing oven');?></small>
    </h4>

    <slims-group-subject url="index.php?p=api/subject/latest"></slims-group-subject>
    <slims-collection url="index.php?p=api/biblio/latest"></slims-collection>

</section>
<?php endif; ?>

<?php if ($sysconf['template']['classic_top_reader']) : ?>
<section class="mt-5 bg-white">
    <div class="container py-5">
        <h4 class="mb-4">
            <?php echo __('Top reader of the year');?>
            <br>
            <small class="subtitle-section"><?php echo __('Our best users, readers, so far. Continue to read if you want your name being mentioned here');?></small>
        </h4>
        <slims-group-member url="index.php?p=api/member/top"></slims-group-member>
    </div>
</section>
<?php endif; ?>

<?php if ($sysconf['template']['classic_map']) : ?>
<section class="my-5 container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <iframe class="embed-responsive"
                    src="<?= $sysconf['template']['classic_map_link']; ?>"
                    height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-md-6 pt-8 md:pt-0">
            <h4><?= $sysconf['library_name']; ?></h4>
            <p><?= $sysconf['template']['classic_map_desc']; ?></p>
            <p class="d-flex flex-row pt-2">
                <a target="_blank" href="<?= $sysconf['template']['classic_fb_link'] ?>" class="btn btn-primary mr-2" name="button"><i class="fab fa-facebook-square text-white"></i></a>
                <a target="_blank" href="<?= $sysconf['template']['classic_youtube_link'] ?>" class="btn btn-danger mr-2" name="button"><i class="fab fa-youtube text-white"></i></a>
                <a target="_blank" href="<?= $sysconf['template']['classic_instagram_link'] ?>" class="btn btn-dark mr-2" name="button"><i class="fab fa-instagram text-white"></i></a>
				<a target="_blank" href="<?= $sysconf['template']['classic_smaitabubakar_link'] ?>" class="btn btn-primary mr-2" name="button"><i class=""><b>SMA</b></i></a>
            </p>
        </div>
    </div>
</section>
<?php endif; ?>
</div>
<!-- FITUR COLLECTION: POIN 2 -->
<script>
            
        $(function () {

            async function getTotal(url, selector = null) {
                if(selector !== null) $(selector).text('...');
                let res = await (await fetch(url)).json();
                if(selector !== null) $(selector).text(new Intl.NumberFormat('id-ID').format(res.data));
                return res.data;
            }

            getTotal('<?= SWB ?>index.php?p=api/biblio/total/all', '.biblio_total_all');
            getTotal('<?= SWB ?>index.php?p=api/item/total/all', '.item_total_all');
            getTotal('<?= SWB ?>index.php?p=api/item/total/lent', '.item_total_lent');
            getTotal('<?= SWB ?>index.php?p=api/item/total/available', '.item_total_available');

            // get summary
            fetch('<?= SWB ?>index.php?p=api/loan/summary')
                .then(res => res.json())
                .then(res => {

                    $('.loan_total').text(new Intl.NumberFormat('id-ID').format(res.data.total));
                    $('.loan_new').text(new Intl.NumberFormat('id-ID').format(res.data.new));
                    $('.loan_return').text(new Intl.NumberFormat('id-ID').format(res.data.return));
                    $('.loan_extend').text(new Intl.NumberFormat('id-ID').format(res.data.extend));
                    $('.loan_overdue').text(new Intl.NumberFormat('id-ID').format(res.data.overdue));

                    let data = [
                        {
                            value: parseInt(res.data.total),
                            color: "#f2f2f2",
                            label: "<?php echo __('Total'); ?>"
                        },
                        {
                            value: parseInt(res.data.new),
                            color: "#337AB7",
                            label: "<?php echo __('Loan'); ?>"
                        },
                        {
                            value: parseInt(res.data.return),
                            color: "#06B1CD",
                            label: "<?php echo __('Return'); ?>"
                        },
                        {
                            value: parseInt(res.data.extend),
                            color: "#4AC49B",
                            label: "<?php echo __('Extend'); ?>"
                        },
                        {
                            value: parseInt(res.data.overdue),
                            color: "#F4CC17",
                            label: "<?php echo __('Overdue'); ?>"
                        }

                    ];

                    let r = $('#radar-chartjs');
                    let container = $(r).parent();
                    let rt = r.get(0).getContext("2d");
                    $(window).resize(respondCanvas);

                    function respondCanvas() {
                        r.attr('width', $(container).width()); //max width
                        r.attr('height', $(container).height()); //max height
                        //Call a function to redraw other content (texts, images etc)
                        let myChart = new Chart(rt).Doughnut(data, {
                            animation: false,
                            segmentStrokeWidth: 1
                        });
                    }

                    respondCanvas()
                });

            // ===================================
            // bar chart
            // ===================================

            fetch('<?= SWB ?>index.php?p=api/loan/getdate/<?= $start_date ?>')
            .then(res => res.json())
            .then(res => {

                let a = getTotal('<?= SWB ?>index.php?p=api/loan/summary/<?= $start_date ?>');
                a.then(res_total => {

                    let lineChartData = {
                        labels: res.raw,
                        datasets: [
                            {
                                fillColor: '#F4CC17',
                                highlightFill: '#F4CC17',
                                data: res_total.loan
                            },
                            {
                                fillColor: '#459CBD',
                                highlightFill: '#459CBD',
                                data: res_total.return
                            },
                            {
                                fillColor: '#5D45BD',
                                highlightFill: '#5D45BD',
                                data: res_total.extend
                            },
                        ]
                    }

                    let c = $('#line-chartjs');
                    let container = $(c).parent();
                    let ct = c.get(0).getContext("2d");
                    $(window).resize(respondCanvas);

                    function respondCanvas() {
                        c.attr('width', $(container).width()); //max width
                        c.attr('height', $(container).height()); //max height
                        //Call a function to redraw other content (texts, images etc)
                        new Chart(ct).Bar(lineChartData, {
                            barShowStroke: false,
                            barDatasetSpacing: 4,
                            animation: {
                                onProgress: function(animation) {
                                    progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                                }
                            }
                        });
                    }
 
                    respondCanvas();
                })
            })
        });

        <?php if ($_SESSION['uid'] === '1') : ?>
        // get lastest release
        fetch('https://api.github.com/repos/slims/slims9_bulian/releases/latest')
            .then(res => res.json())
            .then(res => {
                if (res.tag_name !== '<?= SENAYAN_VERSION_TAG; ?>') {
                    $('#new_version').text(res.tag_name);
                    $('#alert-new-version').removeClass('hidden');
                    $('#alert-new-version a').attr('href', res.html_url)
                }
            })
        <?php endif; ?>

    </script>
<!-- AKHIR POIN 2  -->