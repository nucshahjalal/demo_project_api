<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বাতাইছড়ি দাখিল মাদ্রাসা - Bataichhari Dakhil Madrasah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { font-size: 14px; background-color: #f4f6f9; }
        .bg-custom-header { background: linear-gradient(135deg, #fffcf0 0%, #fff4cc 100%); }
        .bg-custom-blue { background-color: #1e70cd !important; }
        .bg-custom-red { background-color: #c82333 !important; }
        .nav-link { color: white !important; font-weight: 500; border-right: 1px solid rgba(255,255,255,0.2); text-align: center; cursor: pointer; }
        .nav-link:hover { background-color: rgba(0,0,0,0.15); }
        .btn-sidebar { background-color: #d61c2c; color: white; text-align: left; font-weight: bold; border-bottom: 2px solid #b0121f; margin-bottom: 4px; border-radius: 4px; }
        .btn-sidebar:hover { background-color: #b0121f; color: white; }
        
        /* Student Info Card Specific Styling */
        .student-card { border: 1px solid #e2e8f0; border-radius: 4px; overflow: hidden; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .student-img-container { background-color: #fff; padding: 4px; display: flex; justify-content: center; align-items: center; }
        .student-img-container img { width: 100%; height: auto; object-fit: cover; aspect-ratio: 1 / 1; border: 1px solid #eee; }
        .student-details { background-color: #eef2ff; padding: 12px 6px; text-align: center; }
        .student-name { font-weight: bold; color: #333; margin-bottom: 4px; font-size: 15px; }
        .student-class { color: #555; margin-bottom: 4px; font-size: 13px; }
        .student-meta { color: #222; margin-bottom: 2px; font-size: 13px; }
    </style>
</head>
<body>

    <div class="container bg-white border-start border-end shadow-sm p-0 overflow-hidden">
        <div class="d-block">
            <img src="{{asset('backend/assets/images/template.jpg')}}" alt="বাতাইছড়ি দাখিল মাদ্রাসা ব্যানার" class="w-100 h-auto d-block" onerror="this.parentElement.style.display='none'; document.getElementById('fallback-text-header').classList.remove('d-none');">
        </div>

        <div id="fallback-text-header" class="d-none py-4 px-3 bg-custom-header text-center">
            <div class="row align-items-center justify-content-center g-3">
                <div class="col-12 col-md-auto d-flex justify-content-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center border border-3 border-warning shadow-sm" style="width: 110px; height: 110px;">
                        <i class="bi bi-mortarboard-fill fs-1 text-success"></i>
                    </div>
                </div>
                <div class="col-12 col-md-8 text-center px-lg-4">
                    <h1 class="fw-bold mb-1 text-danger" style="font-size: 2.3rem;">বাতাইছড়ি দাখিল মাদ্রাসা</h1>
                    <h2 class="h5 fw-bold text-dark tracking-wide mb-2">BATAICHHARI DAKHIL MADRASAH</h2>
                    <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center mb-2">
                        <span class="badge bg-white text-dark border border-secondary px-3 py-1.5 fw-bold">EIIN: 105165</span>
                        <span class="bg-warning text-dark px-3 py-1 rounded fw-bold small">স্থাপিত : ১৯৭১ ইং</span>
                    </div>
                    <p class="mb-0 fw-semibold text-success"><i class="bi bi-geo-alt-fill text-danger"></i> পোঃ বাতাইছড়ি, উপজেলাঃ বরুড়া, জেলাঃ কুমিল্লা</p>
                </div>
                <div class="col-12 col-md-auto d-flex justify-content-center">
                    <div class="bg-danger text-white p-2.5 rounded shadow-sm border border-danger fw-bold">
                         শতবর্ষ ও সুবর্ণজয়ন্তী
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- menu bar --}}
    <nav class="navbar navbar-expand-lg bg-custom-blue p-0 shadow-sm border-top border-warning border-3 mx-auto container px-0">
        <button class="navbar-toggler ms-auto m-2 bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#mNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mNav">
            <div class="navbar-nav w-100 flex-wrap">
                <a class="nav-link px-3 active bg-dark bg-opacity-25" href="#" id="menu-home">প্রথম পাতা</a>
                <a class="nav-link px-3" href="#">শিক্ষক মণ্ডলী</a>
                {{-- <a class="nav-link px-3 fw-bold text-primary" href="#" id="onlineAdmissionBtn">অনলাইন ভর্তি</a> --}}
                <a class="nav-link px-3 fw-bold text-primary" href="#admissionSection" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="admissionSection" id="onlineAdmissionBtn">অনলাইন ভর্তি</a>
                <a class="nav-link px-3" href="#">Gallery</a>
                <a class="nav-link px-3" href="#">পরীক্ষা সংক্রান্ত</a>
                <a class="nav-link px-3" href="#" id="menu-student-info">Student Information</a>
                <a class="nav-link px-3" href="#">নোটিশ</a>
                <a class="nav-link px-3 border-0" href="#">যোগাযোগ</a>
            </div>
        </div>
    </nav>

    {{-- slide and notice area --}}
    <div id="main-hero-sections">
        <div class="container bg-white border-start border-end py-3">
            <div id="schoolHeroSlider" class="carousel slide carousel-fade shadow-sm rounded border border-light overflow-hidden" data-bs-ride="carousel" data-bs-wrap="true" data-bs-pause="false">
                <div class="carousel-indicators">
                    @foreach($slides as $key => $slide)
                    <button type="button" data-bs-target="#schoolHeroSlider" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner" style="max-height: 400px;">
                    @foreach($slides as $key => $slide)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="4000">
                        <img src="{{ $slide->image ?? 'https://images.unsplash.com/photo-1577896851231-70ef18881754?w=1200&auto=format&fit=crop&q=80' }}" class="d-block w-100 img-fluid object-fit-cover" style="min-height: 250px; height: 400px;" alt="{{ $slide->title }}">
                        @if($slide->caption)
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                            <h5>{{ $slide->caption }}</h5>
                        </div>
                        @endif
                    </div>
                    @endforeach
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
                    <marquee class="fw-semibold text-dark mb-0" scrollamount="4"> <i class="bi bi-patch-check-fill text-danger"></i> বাতাইছড়ি দাখিল মাদ্রাসায় স্বাগতম। ভর্তি কার্যক্রম ও পরীক্ষা রুটিন সংক্রান্ত তথ্যের জন্য ওয়েবসাইট অনুসরণ করুন।</marquee>
                </div>
            </div>
        </div>
    </div>

    {{-- notice and main content area --}}
    <div class="container bg-white border-start border-end pb-5">
        <div class="row g-4">
            
            <div class="col-12 col-lg-9" id="main-content-area">
                
                <div id="home-view-content">
                    <div class="card mb-4 border border-light shadow-sm">
                        <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-envelope-paper-fill me-1"></i> নোটিশ বোর্ড</div>
                        <div class="card-body bg-light bg-opacity-50">
                            <div class="d-flex align-items-start gap-3">
                                <div class="text-success fs-1"><i class="bi bi-globe-americas"></i></div>
                                <div class="w-100">
                                    <ul class="list-unstyled mb-0">
                                        @forelse($notices->take(5) as $notice)
                                        <li class="py-2 border-bottom d-flex justify-content-between align-items-center">
                                            <a href="#" class="text-decoration-none text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#allDataModal">
                                                <i class="bi bi-caret-right-fill text-danger small"></i> {{ $notice->title }}
                                            </a>
                                            <span class="badge bg-secondary p-2">{{ $notice->notice_date ? date('d/m/Y', strtotime($notice->notice_date)) : '' }}</span>
                                        </li>
                                        @empty
                                        <li class="py-2 text-muted">কোন নোটিশ পাওয়া যায়নি</li>
                                        @endforelse
                                        @if($notices->count() > 5)
                                        <li class="py-2 text-center">
                                            <span class="badge bg-secondary p-2" data-bs-toggle="modal" data-bs-target="#allDataModal" style="cursor: pointer;">সকল নোটিশ দেখুন</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- history of institute --}}
                    @if($history)
                    <div class="card mb-4 border border-light shadow-sm">
                        <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-building me-1"></i> প্রতিষ্ঠানের ইতিহাস</div>
                        <div class="card-body">
                            <div class="row g-3">
                                @if($history->image)
                                <div class="col-12 col-md-4">
                                    <img src="{{ $history->image }}" alt="প্রতিষ্ঠানের ইতিহাস" class="img-fluid border rounded shadow-sm">
                                </div>
                                @endif
                                <div class="col-12 @if($history->image) col-md-8 @endif text-secondary small" style="line-height: 1.7;">
                                    {{ $history->content }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- speech of president and principal --}}
                    @if($president_speech || $principal_speech)
                    <div class="row g-3 mb-4">
                        @if($president_speech)
                        <div class="col-12 col-md-6">
                            <div class="card h-100 border border-light shadow-sm">
                                <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-person-fill me-1"></i> সভাপতির বাণী</div>
                                <div class="card-body text-center">
                                    <img src="{{ $president_speech->image ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=150&auto=format&fit=crop&q=80' }}" alt="{{ $president_speech->name }}" class="img-fluid rounded border border-2 border-light mb-2 shadow-sm" style="width: 105px; height: 125px; object-fit: cover;">
                                    <h6 class="fw-bold text-dark mb-0">{{ $president_speech->name }}</h6>
                                    <small class="text-muted d-block mb-2">{{ $president_speech->title ?? 'সভাপতি, গভর্নিং বডি' }}</small>
                                    <p class="text-secondary small text-start mb-0" style="line-height:1.6;">
                                        {{ $president_speech->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($principal_speech)
                        <div class="col-12 col-md-6">
                            <div class="card h-100 border border-light shadow-sm">
                                <div class="card-header bg-custom-blue text-white fw-bold py-2"><i class="bi bi-person-bounding-box me-1"></i> সুপারের বাণী</div>
                                <div class="card-body text-center">
                                    <img src="{{ $principal_speech->image ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&auto=format&fit=crop&q=80' }}" alt="{{ $principal_speech->name }}" class="img-fluid rounded border border-2 border-light mb-2 shadow-sm" style="width: 105px; height: 125px; object-fit: cover;">
                                    <h6 class="fw-bold text-dark mb-0">{{ $principal_speech->name }}</h6>
                                    <small class="text-muted d-block mb-2">{{ $principal_speech->title ?? 'সুপারিনটেনডেন্ট' }}</small>
                                    <p class="text-secondary small text-start mb-0" style="line-height:1.6;">
                                        {{ $principal_speech->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>

                {{-- student list show --}}
                <div id="student-info-view-content" class="d-none">
                    <div class="card mb-4 border border-light shadow-sm">
                        <div class="row w-100 m-0">
                            <div class="col-12 card-header bg-custom-blue text-white fw-bold py-3 px-4 rounded-0 w-100">
                                <i class="bi bi-people-fill me-2"></i> কৃতি শিক্ষার্থী তালিকা
                            </div>
                        </div>
                        <div class="card-body bg-light bg-opacity-25">
                            <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-md-4 w-100 mx-0">
                                {{-- @forelse($students as $student)
                                <div class="col">
                                    <div class="student-card h-100 border rounded p-3 text-center bg-white shadow-sm">
                                        <div class="student-img-container mb-3">
                                            <img src="{{ $student->image ?? 'https://placehold.co/150x150/png' }}" alt="{{ $student->name ?? $student->student_name_en ?? 'Student' }}" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                        <div class="student-details">
                                            <h5 class="student-name fw-bold mb-1">{{ $student->name ?? $student->student_name_bn ?? $student->student_name_en ?? 'Student' }}</h5>
                                            <div class="student-class text-muted small mb-2">{{ $student->class ?? '' }}</div>
                                            <div class="student-meta badge bg-secondary me-1">Roll: {{ $student->roll ?? $student->id ?? '' }}</div>
                                            <div class="student-meta badge bg-light text-dark border">Reg: {{ $student->reg ?? $student->id ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center text-muted py-5">কোন শিক্ষার্থীর তথ্য পাওয়া যায়নি</div>
                                @endforelse --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div id="admissionSection" class="d-none container px-0 mt-3">
                    
                    <div class="w-100 mb-3">
                        <div class="card-header bg-success text-white fw-bold py-3 px-4 rounded-0 w-100">
                            <i class="bi bi-file-earmark-person-fill me-2"></i> অনলাইন ভর্তি আবেদন ফরম
                        </div>
                    </div>

                    <div class="card-body bg-light bg-opacity-25 p-4 border rounded-bottom bg-white shadow-sm">
                        <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <h5 class="text-success fw-bold border-bottom pb-2 mb-3">
                                <i class="bi bi-mortarboard me-2"></i> ১. শিক্ষাগত তথ্য (Academic Information)
                            </h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">আবেদনকৃত শ্রেণী <span class="text-danger">*</span></label>
                                    <select class="form-select text-muted" name="admission_class" required>
                                        <option value="" selected disabled>শ্রেণী নির্বাচন করুন...</option>
                                        <option value="6">দাখিল ষষ্ঠ শ্রেণী</option>
                                        <option value="7">দাখিল ৭ম শ্রেণী</option>
                                        <option value="8">দাখিল ৮ম শ্রেণী</option>
                                        <option value="9">দাখিল ৯ম শ্রেণী</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">পূর্ববর্তী পাসকৃত শ্রেণী <span class="text-danger">*</span></label>
                                    <select class="form-select text-muted" name="previous_class" required>
                                        <option value="" selected disabled>শ্রেণী নির্বাচন করুন...</option>
                                        <option value="5">৫ম শ্রেণী পাস</option>
                                        <option value="6">৬ষ্ঠ শ্রেণী পাস</option>
                                        <option value="7">৭ম শ্রেণী পাস</option>
                                        <option value="8">৮ম শ্রেণী পাস (JDC/JSC)</option>
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-success fw-bold border-bottom pb-2 mb-3">
                                <i class="bi bi-person me-2"></i> ২. শিক্ষার্থীর ব্যক্তিগত তথ্য (Personal Details)
                            </h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">শিক্ষার্থীর নাম (বাংলায়) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_name_bn" placeholder="উদাঃ ফারিয়া আক্তার" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">Student's Name (In English) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_name_en" placeholder="e.g. Faria Akter" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">পিতার নাম (বাংলায়) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">মাতার নাম (বাংলায়) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small text-dark">মোবাইল নম্বর <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text small bg-light">+৮৮০</span>
                                        <input type="tel" class="form-control" name="phone_number" placeholder="17XXXXXXXX" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small text-dark">জন্ম তারিখ <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dob" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small text-dark">লিঙ্গ (Gender) <span class="text-danger">*</span></label>
                                    <select class="form-select" name="gender" required>
                                        <option value="" selected disabled>নির্বাচন করুন...</option>
                                        <option value="Male">ছাত্র (Male)</option>
                                        <option value="Female">ছাত্রী (Female)</option>
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-success fw-bold border-bottom pb-2 mb-3">
                                <i class="bi bi-geo-alt me-2"></i> ৩. ঠিকানা ও কাগজপত্র (Address & Documents)
                            </h5>
                            <div class="row g-3 mb-4">
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-dark">বর্তমান ঠিকানা <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="current_address" rows="2" placeholder="গ্রাম, ডাকঘর, উপজেলা, জেলা..." required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">শিক্ষার্থীর ছবি (Passport Size Photo) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="student_photo" accept="image/*" required>
                                    <div class="form-text small text-muted">সর্বোচ্চ সাইজ: 500KB (JPG, PNG)</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">অনলাইন জন্ম নিবন্ধন সনদ / পিএসসি সার্টিফিকেট</label>
                                    <input type="file" class="form-control" name="student_document" accept="image/*,application/pdf">
                                    <div class="form-text small text-muted">সর্বোচ্চ সাইজ: 1MB (PDF, JPG)</div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 text-end">
                                    <button type="reset" class="btn btn-outline-secondary px-4 fw-bold me-2">মুছে ফেলুন (Reset)</button>
                                    <button type="submit" class="btn btn-success px-5 fw-bold">আবেদন জমা দিন <i class="bi bi-send-fill ms-1"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="row g-3" id="home-bottom-links">
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

            <div class="col-12 col-lg-3" id="right-sidebar-area">
                <div class="mb-4">
                    <div class="d-flex flex-column">
                        <a href="#" class="btn btn-sidebar btn-sm"><i class="bi bi-arrow-right-circle-fill me-1"></i> শিক্ষা মন্ত্রণালয়</a>
                        <a href="#" class="btn btn-sidebar btn-sm"><i class="bi bi-arrow-right-circle-fill me-1"></i> প্রধানমন্ত্রীর শিক্ষা সহায়তা</a>
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

    {{-- under button list --}}
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

    {{-- footer area --}}
    <footer class="bg-black text-white-50 py-3 text-center small border-top border-secondary">
        <div class="container">
            <p class="mb-0">&copy; ২০২৬ বাতাইছড়ি দাখিল মাদ্রাসা। সর্বস্বত্ব সংরক্ষিত।</p>
        </div>
    </footer>

    {{-- show modal notice --}}
    <div class="modal fade" id="allDataModal" tabindex="-1" aria-labelledby="allDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow-lg border-0">
                
                <div class="modal-header bg-custom-blue text-white">
                    <h5 class="modal-title fw-bold" id="allDataModalLabel">
                        <i class="bi bi-info-circle-fill me-2"></i> নোটিশ ও নোটিফিকেশন বিবরণী
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 small">
                        <i class="bi bi-megaphone-fill me-1"></i> বাতাইছড়ি দাখিল মাদ্রাসা নোটিশ নোটিফিকেশন বুকের সমস্ত ডেটা নিচে দেওয়া হলো।
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>তারিখ</th>
                                    <th>নোটিশের বিষয়</th>
                                    <th>শাখা</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($notices as $notice)
                                <tr>
                                    <td>{{ $notice->notice_date ? date('d/m/Y', strtotime($notice->notice_date)) : '' }}</td>
                                    <td>{{ $notice->title }}</td>
                                    <td><span class="badge bg-{{ $notice->category == 'সাধারণ' ? 'success' : 'primary' }}">{{ $notice->category ?? 'সাধারণ' }}</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">কোন নোটিশ পাওয়া যায়নি</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">বন্ধ করুন</button>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bundle.min.js"></script>
    
    <script>
        const mainContentArea = document.getElementById('main-content-area');
        const rightSidebarArea = document.getElementById('right-sidebar-area');

        document.getElementById('menu-student-info').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Toggle Active Links
            document.getElementById('menu-home').classList.remove('active', 'bg-dark', 'bg-opacity-25');
            this.classList.add('active', 'bg-dark', 'bg-opacity-25');
            
            // Hide Banner/Slider Area
            document.getElementById('main-hero-sections').classList.add('d-none');
            
            // Core Change: Shift Content Column Layout to Full Width & Hide Sidebar
            mainContentArea.classList.remove('col-lg-9');
            mainContentArea.classList.add('col-lg-12');
            rightSidebarArea.classList.add('d-none');

            // Toggle Domestic Views
            document.getElementById('home-view-content').classList.add('d-none');
            document.getElementById('home-bottom-links').classList.add('d-none');
            document.getElementById('student-info-view-content').classList.remove('d-none');
        });

        document.getElementById('menu-home').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Toggle Active Links
            document.getElementById('menu-student-info').classList.remove('active', 'bg-dark', 'bg-opacity-25');
            this.classList.add('active', 'bg-dark', 'bg-opacity-25');
            
            // Show Banner/Slider Area
            document.getElementById('main-hero-sections').classList.remove('d-none');
            
            // Core Change: Restore Sidebar Layout System
            mainContentArea.classList.remove('col-lg-12');
            mainContentArea.classList.add('col-lg-9');
            rightSidebarArea.classList.remove('d-none');
            
            // Toggle Domestic Views
            document.getElementById('home-view-content').classList.remove('d-none');
            document.getElementById('home-bottom-links').classList.remove('d-none');
            document.getElementById('student-info-view-content').classList.add('d-none');
        });
    </script>
    
    <!-- notice modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openButtons = document.querySelectorAll('[data-bs-target="#allDataModal"]');
            const myModal = new bootstrap.Modal(document.getElementById('allDataModal'));

            openButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    myModal.show(); // Force show the modal
                });
            });
        });
    </script>
    
    {{--  adminssion form show --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const admissionBtn = document.getElementById('onlineAdmissionBtn');
            const admissionSection = document.getElementById('admissionSection');

            const mainContentArea = document.getElementById('main-content-area');
            const rightSidebarArea = document.getElementById('right-sidebar-area');

            if (admissionBtn && admissionSection) {

                admissionBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Active menu style
                    document.querySelectorAll('.nav-link').forEach(link => {
                        link.classList.remove('active', 'bg-dark', 'bg-opacity-25');
                    });

                    this.classList.add('active', 'bg-dark', 'bg-opacity-25');

                    // Hide Hero Slider Section
                    document.getElementById('main-hero-sections').classList.add('d-none');

                    // Full width content
                    mainContentArea.classList.remove('col-lg-9');
                    mainContentArea.classList.add('col-lg-12');

                    // Hide sidebar
                    rightSidebarArea.classList.add('d-none');

                    // Hide other sections
                    document.getElementById('home-view-content').classList.add('d-none');
                    document.getElementById('home-bottom-links').classList.add('d-none');
                    document.getElementById('student-info-view-content').classList.add('d-none');

                    // Show admission form
                    admissionSection.classList.remove('d-none');
                    admissionSection.style.display = 'block';

                    // Smooth scroll
                    setTimeout(() => {
                        admissionSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                });

                // Home button restore
                document.getElementById('menu-home').addEventListener('click', function(e) {
                    e.preventDefault();

                    // Active style reset
                    document.querySelectorAll('.nav-link').forEach(link => {
                        link.classList.remove('active', 'bg-dark', 'bg-opacity-25');
                    });

                    this.classList.add('active', 'bg-dark', 'bg-opacity-25');

                    // Show Hero
                    document.getElementById('main-hero-sections').classList.remove('d-none');

                    // Restore layout
                    mainContentArea.classList.remove('col-lg-12');
                    mainContentArea.classList.add('col-lg-9');

                    // Show sidebar
                    rightSidebarArea.classList.remove('d-none');

                    // Show home sections
                    document.getElementById('home-view-content').classList.remove('d-none');
                    document.getElementById('home-bottom-links').classList.remove('d-none');

                    // Hide other sections
                    document.getElementById('student-info-view-content').classList.add('d-none');
                    admissionSection.classList.add('d-none');
                });

            }
        });
    </script>
</body>
</html>

