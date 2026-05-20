<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বাতাইছড়ি দাখিল মাদ্রাসা - Bataichhari Dakhil Madrasah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { font-size: 14px; background-color: #f4f6f9; }
        .bg-custom-header { background: linear-gradient(135deg, #fffcf0 0%, #fff4cc 100%); }
        .bg-custom-blue { background-color: #1e70cd !important; }
        .bg-custom-red { background-color: #c82333 !important; }
        .nav-link { color: white !important; font-weight: 500; border-right: 1px solid rgba(255,255,255,0.2); text-align: center; }
        .nav-link:hover { background-color: rgba(0,0,0,0.15); }
        .btn-sidebar { background-color: #d61c2c; color: white; text-align: left; font-weight: bold; border-bottom: 2px solid #b0121f; margin-bottom: 4px; border-radius: 4px; }
        .btn-sidebar:hover { background-color: #b0121f; color: white; }
    </style>
</head>
<body>

    <div class="container bg-white border-start border-end shadow-sm p-0 overflow-hidden">
    
    <div class="d-block">
        <img src="{{asset('backend/assets/images/template.jpg')}}" alt="বাতাইছড়ি দাখিল মাদ্রাসা ব্যানার" class="w-100 h-auto d-block" onerror="this.parentElement.style.display='none'; document.getElementById('fallback-text-header').classList.remove('d-none');">
    </div>

    <div id="fallback-text-header" class="d-none py-4 px-3 bg-custom-header text-center">
        <div class="row align-items-center justify-content-center g-3">
            
            <div class="col-12 col-md-auto d-flex justify-content-center">
                <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center border border-3 border-warning shadow-sm" style="width: 110px; height: 110px;">
                    <i class="bi bi-mortarboard-fill fs-1 text-success"></i>
                </div>
            </div>
            
            <div class="col-12 col-md-8 text-center px-lg-4">
                <h1 class="fw-bold mb-1 text-danger" style="font-size: 2.3rem;">বাতাইছড়ি দাখিল মাদ্রাসা</h1>
                <h2 class="h5 fw-bold text-dark tracking-wide mb-2">BATAICHHARI DAKHIL MADRASAH</h2>
                
                <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center mb-2">
                    <span class="badge bg-white text-dark border border-secondary px-3 py-1.5 fw-bold">EIIN: 105165</span>
                    <span class="bg-warning text-dark px-3 py-1 rounded fw-bold small">স্থাপিত : ১৯৭১ ইং</span>
                </div>
                
                <p class="mb-0 fw-semibold text-success"><i class="bi bi-geo-alt-fill text-danger"></i> পোঃ বাতাইছড়ি, উপজেলাঃ বরুড়া, জেলাঃ কুমিল্লা</p>
            </div>
            
            <div class="col-12 col-md-auto d-flex justify-content-center">
                <div class="bg-danger text-white p-2.5 rounded shadow-sm border border-danger fw-bold">
                    মুজিব শতবর্ষ ও সুবর্ণজয়ন্তী
                </div>
            </div>

        </div>
    </div>

</div>

    <nav class="navbar navbar-expand-lg bg-custom-blue p-0 shadow-sm border-top border-warning border-3 mx-auto container px-0">
        <button class="navbar-toggler ms-auto m-2 bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#mNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mNav">
            <div class="navbar-nav w-100 flex-wrap">
                <a class="nav-link px-3 active bg-dark bg-opacity-25" href="#">প্রথম পাতা</a>
                <a class="nav-link px-3" href="#">শিক্ষক মণ্ডলী</a>
                <a class="nav-link px-3" href="#">অনলাইন ভর্তি</a>
                <a class="nav-link px-3" href="#">Gallery</a>
                <a class="nav-link px-3" href="#">পরীক্ষা সংক্রান্ত</a>
                <a class="nav-link px-3" href="#">Student Information</a>
                <a class="nav-link px-3" href="#">নোটিশ</a>
                <a class="nav-link px-3 border-0" href="#">যোগাযোগ</a>
            </div>
        </div>
    </nav>

    <div class="container bg-white border-start border-end py-3">
        <div id="schoolHeroSlider" class="carousel slide carousel-fade shadow-sm rounded border border-light overflow-hidden" data-bs-ride="carousel" data-bs-wrap="true" data-bs-pause="false">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#schoolHeroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#schoolHeroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#schoolHeroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner" style="max-height: 400px;">
                
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=1200&auto=format&fit=crop&q=80" class="d-block w-100 img-fluid object-fit-cover" style="min-height: 250px; height: 400px;" alt="মাদ্রাসা এসেম্বলি ও ক্লাস">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                        <h5>আমাদের মাল্টিমিডিয়া ক্লাসরুম</h5>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="4000">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200&auto=format&fit=crop&q=80" class="d-block w-100 img-fluid object-fit-cover" style="min-height: 250px; height: 400px;" alt="মাদ্রাসা ক্যাম্পাস">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                        <h5>মনোরম শিক্ষার্থীবান্ধব পরিবেশ</h5>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="4000">
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&auto=format&fit=crop&q=80" class="d-block w-100 img-fluid object-fit-cover" style="min-height: 250px; height: 400px;" alt="মাদ্রাসা ভবন">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                        <h5>আধুনিক ও নৈতিক শিক্ষার সমন্বয়</h5>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#schoolHeroSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#schoolHeroSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>

    <div class="container bg-white border-start border-end pb-3">
        <div class="row g-0 border border-info rounded align-items-center overflow-hidden">
            <div class="col-auto bg-info text-white px-3 py-2 fw-bold text-nowrap">সর্বশেষ ঘোষণা</div>
            <div class="col bg-info bg-opacity-10 py-2 ps-3">
                <marquee class="fw-semibold text-dark mb-0" scrollamount="4"> <i class="bi bi-patch-check-fill text-danger"></i> বাতাইছড়ি দাখিল মাদ্রাসায় স্বাগতম। ভর্তি কার্যক্রম ও পরীক্ষা রুটিন সংক্রান্ত তথ্যের জন্য ওয়েবসাইট অনুসরণ করুন।</marquee>
            </div>
        </div>
    </div>

    <div class="container bg-white border-start border-end pb-5">
        <div class="row g-4">
            
            <div class="col-12 col-lg-9">
                
                <div class="card mb-4 border border-light shadow-sm">
                    <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-envelope-paper-fill me-1"></i> নোটিশ বোর্ড</div>
                    <div class="card-body bg-light bg-opacity-50">
                        <div class="d-flex align-items-start gap-3">
                            <div class="text-success fs-1"><i class="bi bi-globe-americas"></i></div>
                            <div class="w-100">
                                <ul class="list-unstyled mb-0">
                                    <li class="py-2 border-bottom d-flex justify-content-between align-items-center">
                                        <a href="#" class="text-decoration-none text-dark fw-bold"><i class="bi bi-caret-right-fill text-danger small"></i> বাতাইছড়ি দাখিল মাদ্রাসা নোটিশ নোটিফিকেশন বুক।</a>
                                        <span class="badge bg-secondary p-1">সকল</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 border border-light shadow-sm">
                    <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-building me-1"></i> প্রতিষ্ঠানের ইতিহাস</div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=400&auto=format&fit=crop&q=60" alt="Complex" class="img-fluid border rounded shadow-sm">
                            </div>
                            <div class="col-12 col-md-8 text-secondary small" style="line-height: 1.7;">
                                ১৯৭১ সালে প্রতিষ্ঠিত বাতাইছড়ি দাখিল মাদ্রাসা এর ধারাবাহিক সাফল্য এলাকাবাসীর দাবী ও শিক্ষার্থীদের চাহিদার প্রেক্ষিতে ডিজিটাল বাংলাদেশ গড়ার প্রত্যয়ে প্রতিষ্ঠিত করা হয়েছে। এই প্রতিষ্ঠানটি বর্তমানে কুমিল্লা জেলার অন্যতম শিক্ষা প্রতিষ্ঠানে পরিণত হয়েছে। এটি প্রতিষ্ঠানের পরিচালকবৃন্দ, শিক্ষকবৃন্দ, অভিভাবকবৃন্দ, শিক্ষার্থীদের ও সর্বোপরি এলাকাবাসীর সমন্বিত প্রচেষ্টার ফল। অত্র এলাকার দ্বীনি ও আধুনিক শিক্ষার প্রসারে মাদ্রাসাটি সর্বদা অগ্রণী ভূমিকা পালন করছে।
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <div class="card h-100 border border-light shadow-sm">
                            <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-person-fill me-1"></i> সভাপতির বাণী</div>
                            <div class="card-body text-center">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=150&auto=format&fit=crop&q=80" alt="President" class="img-fluid rounded border border-2 border-light mb-2 shadow-sm" style="width: 105px; height: 125px; object-fit: cover;">
                                <h6 class="fw-bold text-dark mb-0">জনাব মোহাম্মদ আলী</h6>
                                <small class="text-muted d-block mb-2">সভাপতি, গভর্নিং বডি</small>
                                <p class="text-secondary small text-start mb-0" style="line-height:1.6;">
                                    ডিজিটাল বাংলাদেশ গড়ার লক্ষে মাদ্রাসার শিক্ষা শিক্ষাব্যবস্থাকে বেগবান ও আধুনিকায়ন করতে মাল্টিমিডিয়া ক্লাসসহ বিভিন্ন স্তরে তথ্য-প্রযুক্তির যে অবদান রাখছে তার জন্য বর্তমান সরকারকে ধন্যবাদ জানাই।
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card h-100 border border-light shadow-sm">
                            <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-person-bounding-box me-1"></i> সুপারের বাণী</div>
                            <div class="card-body text-center">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&auto=format&fit=crop&q=80" alt="Super" class="img-fluid rounded border border-2 border-light mb-2 shadow-sm" style="width: 105px; height: 125px; object-fit: cover;">
                                <h6 class="fw-bold text-dark mb-0">মাওলানা মোঃ ইব্রাহীম</h6>
                                <small class="text-muted d-block mb-2">সুপারিনটেনডেন্ট</small>
                                <p class="text-secondary small text-start mb-0" style="line-height:1.6;">
                                    যুগের প্রয়োজনে মানব কল্যাণে সমাজ হিতৈষী ব্যক্তিরা কখনো কখনো শিক্ষা প্রতিষ্ঠানের ভূমিকায় অবতীর্ণ হন। তেমনি ভাবেই দক্ষ, অভিজ্ঞ, দ্বীনি ও বিজ্ঞানমনস্ক নাগরিক তৈরি করাই আমাদের মূল উদ্দেশ্য।
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header text-white fw-bold py-2" style="background-color: #c22955;"><i class="bi bi-person-vcard me-1"></i> ছাত্র/ছাত্রী তথ্য/রেজাল্ট</div>
                            <div class="list-group list-group-flush small">
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> অনলাইন ভর্তি কার্যক্রম</a>
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> পরীক্ষার এডমিট কার্ড</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header text-white fw-bold py-2" style="background-color: #1a9c68;"><i class="bi bi-tablet me-1"></i> ই-বুক / পাঠ্যপুস্তক</div>
                            <div class="list-group list-group-flush small">
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> ২০২৬ শিক্ষাবর্ষের সকল পাঠ্যপুস্তক</a>
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> মাদ্রাসার সিলেবাস</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header text-white fw-bold py-2" style="background-color: #cb7a1e;"><i class="bi bi-download me-1"></i> ডাউনলোড জোন</div>
                            <div class="list-group list-group-flush small">
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> দাখিল পরীক্ষার রুটিন ডাউনলোড</a>
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> ছুটির তালিকা ডাউনলোড</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header text-white fw-bold py-2" style="background-color: #259cb8;"><i class="bi bi-link-45deg me-1"></i> গুরুত্বপূর্ণ লিংক</div>
                            <div class="list-group list-group-flush small">
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> বাংলাদেশ মাদ্রাসা শিক্ষা বোর্ড</a>
                                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-check-lg text-success me-1"></i> মাদ্রাসা শিক্ষা অধিদপ্তর</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-3">
                
                <div class="mb-4">
                    <div class="d-flex flex-column">
                        <a href="#" class="btn btn-sidebar btn-sm"><i class="bi bi-arrow-right-circle-fill me-1"></i> শিক্ষা মন্ত্রণালয়</a>
                        <a href="#" class="btn btn-sidebar btn-sm"><i class="bi bi-arrow-right-circle-fill me-1"></i> প্রধানমন্ত্রীর শিক্ষা সহায়তা</a>
                        <a href="#" class="btn btn-sidebar btn-sm"><i class="bi bi-arrow-right-circle-fill me-1"></i> মাদ্রাসা শিক্ষা বোর্ড</a>
                        <a href="#" class="btn btn-sidebar btn-sm"><i class="bi bi-arrow-right-circle-fill me-1"></i> কুমিল্লা বোর্ড</a>
                    </div>
                </div>

                <div class="card mb-4 border border-light shadow-sm">
                    <div class="card-header bg-custom-blue text-white fw-bold py-1.5 small">Our Facebook Page</div>
                    <div class="card-body bg-light text-center py-4 text-muted small">
                        <i class="bi bi-facebook text-primary display-6 mb-2"></i>
                        <div>Find Us on Facebook</div>
                    </div>
                </div>

                <div class="card border border-light shadow-sm p-3 bg-light">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3 text-center"><i class="bi bi-shield-exclamation text-danger me-1"></i> জরুরি হটলাইন</h6>
                    
                    <div class="d-flex flex-column gap-2 text-center text-white font-monospace">
                        <div class="bg-primary p-2 rounded shadow-sm d-flex justify-content-around align-items-center">
                            <span class="fw-bold fs-4">৩৩৩</span>
                            <span class="small border-start ps-3" style="font-size: 11px;">সরকারি তথ্য ও সেবা</span>
                        </div>
                        <div class="bg-success p-2 rounded shadow-sm d-flex justify-content-around align-items-center">
                            <span class="fw-bold fs-4">৯৯৯</span>
                            <span class="small border-start ps-3" style="font-size: 11px;">জাতীয় জরুরি সেবা</span>
                        </div>
                        <div class="bg-danger p-2 rounded shadow-sm d-flex justify-content-around align-items-center">
                            <span class="fw-bold fs-4">১০৯</span>
                            <span class="small border-start ps-3" style="font-size: 11px;">নারী ও শিশু নির্যাতন</span>
                        </div>
                        <div class="bg-warning text-dark p-2 rounded shadow-sm d-flex justify-content-around align-items-center">
                            <span class="fw-bold fs-4">১০৬</span>
                            <span class="small border-start border-dark ps-3" style="font-size: 11px;">দুদক হটলাইন</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <section class="bg-dark text-white py-4 border-top border-warning border-3">
        <div class="container">
            <div class="row g-2 justify-content-center text-center">
                <div class="col-6 col-sm-3 col-md-2">
                    <button class="btn btn-outline-warning w-100 py-2.5 small fw-bold text-white border-secondary">
                        <i class="bi bi-journal-check d-block mb-1 fs-4"></i> অনলাইন ভর্তি
                    </button>
                </div>
                <div class="col-6 col-sm-3 col-md-2">
                    <button class="btn btn-outline-warning w-100 py-2.5 small fw-bold text-white border-secondary">
                        <i class="bi bi-images d-block mb-1 fs-4"></i> গ্যালারি
                    </button>
                </div>
                <div class="col-6 col-sm-3 col-md-2">
                    <button class="btn btn-outline-warning w-100 py-2.5 small fw-bold text-white border-secondary">
                        <i class="bi bi-telephone-inbound d-block mb-1 fs-4"></i> যোগাযোগ
                    </button>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-black text-white-50 py-3 text-center small border-top border-secondary">
        <div class="container">
            <p class="mb-0">&copy; ২০২৬ বাতাইছড়ি দাখিল মাদ্রাসা। সর্বস্বত্ব সংরক্ষিত।</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
