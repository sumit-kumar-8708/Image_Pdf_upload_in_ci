<form action="<?= base_url().'mentor/study_material/add_material_img_pdf' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id"><b>Sections</b></label> 
                                    <select name="section_id" class="form-control " id="section_id">
                                        <option value="">---Select---</option>
                                        <? if ($section_list) : ?>
                                            <? foreach ($section_list as $section) : ?>
                                                <option value="<?= $section->id ?>"><?= $section->title ?></option>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="topic_id"><b>Topics</b></label>
                                    <select name="topic_id" id="topic_id" class="form-control ">
                                        <option value="">---Select---</option>                                 
                                    </select>                               
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sub_topic_id"><b>Sub-Topics</b></label>
                                    <select name="subtopic_id" id="sub_topic_id" class="form-control ">
                                        <option value="">---Select---</option>                               
                                    </select>                               
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><b>Title</b></label>
                                    <input name="title" type="text" class="form-control" id="" placeholder="title">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><b>Image-Pdf</b></label>
                                    <input name="img_pdf" type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div> 
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-success">Uploads </button>
                            </div>                                                   
                        </div>                       
                    </form>