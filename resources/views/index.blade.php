@extends ('layouts.master')
@section('content')
    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-sm-6">
                        <a href="{{url('internform')}}" class="portfolio-box">
                            <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Fill the form!
                                    </div>
                                    <div class="project-name">
                                        Internship Form
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <a href="{{url('proposal')}}" class="portfolio-box">
                            <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Click the file to download!
                                    </div>
                                    <div class="project-name">
                                        Internship Proposal
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12"> 
                    <div class="col-lg-6 col-sm-6">
                        <a href="{{URL::to('dailylog')}}" class="portfolio-box">
                            <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Keep track of your progress!
                                    </div>
                                    <div class="project-name">
                                        Daily Log
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <a href="{{url('companylist')}}" class="portfolio-box">
                            <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        See list of registered companies here!
                                    </div>
                                    <div class="project-name">
                                        Company List
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection