@extends('backend.app')
@section('page_title','ID Card')
@section('content')
<!-- Bootstrap 5 CSS CDN (যদি আপনার প্রোজেক্টে না থাকে) -->


<div style="margin-left:18%;" class="container mt-5 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0 text-center">ID Card Template Designer</h4>
        </div>
        <div class="card-body p-4">
            <!-- ফাইল আপলোডের জন্য enctype যুক্ত করা হয়েছে -->
            <form method="POST" action="{{ route('idcard.save') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <!-- Template Name & File -->
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Card Name</label>
                        <input type="text" name="card_name" class="form-control" placeholder="e.g. Student ID v1" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Background/Template File</label>
                        <input type="file" name="template_file" class="form-control">
                        <div class="form-text text-muted">Upload BG image (JPG/PNG)</div>
                    </div>

                    <!-- Page Settings -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Page Width (mm)</label>
                        <input type="number" name="page_width" class="form-control" value="210">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Page Height (mm)</label>
                        <input type="number" name="page_height" class="form-control" value="297">
                    </div>

                    <!-- Style & Signature -->
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Photo Style</label>
                        <select name="photo_style" class="form-select">
                            <option value="square">Square</option>
                            <option value="round">Round</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Photo Size (px)</label>
                        <input type="number" name="photo_size" class="form-control" value="100">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Signature Text</label>
                        <input type="text" name="signature" class="form-control" placeholder="Principal">
                    </div>

                    <!-- Margins -->
                    <div class="col-12"><h6 class="border-bottom pb-2 mt-3 fw-bold">Margins (mm)</h6></div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted">TOP</label>
                        <input type="number" name="margin_top" class="form-control" value="5">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted">BOTTOM</label>
                        <input type="number" name="margin_bottom" class="form-control" value="5">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted">LEFT</label>
                        <input type="number" name="margin_left" class="form-control" value="5">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted">RIGHT</label>
                        <input type="number" name="margin_right" class="form-control" value="5">
                    </div>

                    <!-- HTML Editors -->
                    <div class="col-12 mt-4">
                        <label class="form-label fw-bold">Template Text Mapping</label>
                        <textarea name="template_html" class="form-control bg-light font-monospace" rows="3">Name: [NAME]&#10;ID: [ID]&#10;F.Name: [F_NAME]; Roll: [ROLL];Photo: [photo]; Address: [ADDRESS]</textarea>
                    </div>

                   <div class="row">
                        <!-- বাম পাশে এডিটর -->
                        <div class="col-md-7 mt-3">
                            <label class="form-label fw-bold text-primary">Editor (HTML/CSS Structure)</label>
                            <textarea id="tteditor" name="editor_content" class="form-control bg-dark text-warning font-monospace" rows="12">
                                <div class="id-card" style="border: 1px solid #000; width: 63mm; height: 91mm; padding: 15px; background-image: url('[TEMPLATE_FILE]'); background-size: cover; position: relative; color: #000; margin: auto; background-color: #fff;">
                                    <div style="text-align: center;">
                                        <img src="[PHOTO_URL]" style="width: 80px; height: 80px; border: 1px solid #ccc; border-radius: 5px;">
                                    </div>
                                    <div style="margin-top: 15px;">
                                        <h3 style="margin: 0; font-size: 18px; text-align: center;">[NAME]</h3>
                                        <p style="margin: 5px 0;"><strong>ID:</strong> [ID]</p>
                                        <p style="margin: 5px 0;"><strong>F.Name:</strong> [F_NAME]</p>
                                        <p style="margin: 5px 0;"><strong>Roll:</strong> [ROLL]</p>
                                    </div>
                                </div> 
                            </textarea>
                        </div>

                        
                    </div>

                     {{-- <textarea name="editor_content" id="editor" rows="6" class="form-control bg-dark text-warning font-monospace" rows="10" style="border: 1px solid #000; width: 63mm; padding: 10px; background-image: url('[TEMPLATE_FILE]'); background-size: cover;">
                        <img src="[PHOTO_URL]" class="photo" style="width: 80px;">
                            <p>Photo: [photo]</p>
                            <h3>[NAME]</h3>
                            <p>ID: [ID]</p>
                            <p>F.Name: [F_NAME]</p>
                            <p>Roll: [ROLL]</p>
                            </div>
                    </textarea> --}}

                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow">Save Template</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- script  script method and css style use -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>



@endsection