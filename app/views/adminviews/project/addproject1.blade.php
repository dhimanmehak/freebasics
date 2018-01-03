@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Stepy Form With Validation</h6>
                    <div id="top_tabby">
                    </div>
                </div>
                <div class="widget_content">
                    <h3>Basic Information</h3>                   
                    <form id="stepy_form" class="form_container left_label">
                        <fieldset title="Step 1">
                            <legend>Basic</legend>
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Project Name</label>
                                        <div class="form_input">
                                            <input name="project" type="text" tabindex="1" class="limiter "/>
                                            <span class="input_instruction green">This is an instruction</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12" >
                                        <label class="field_title">Category</label>
                                        <div class="form_input">
                                            <select data-placeholder="Select a Template" style=" width:300px" class="chzn-select" tabindex="13">
                                                <option value=""></option>
                                                <optgroup label="NFC EAST">
                                                    <option>Dallas Cowboys</option>
                                                    <option>New York Giants</option>
                                                    <option>Philadelphia Eagles</option>
                                                    <option>Washington Redskins</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Upload Image</label>
                                        <div class="form_input">
                                            <input name="image" type="file" tabindex="2"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Select Email</label>
                                        <div class="form_input">
                                            <select data-placeholder="Select a Template" style=" width:300px" class="chzn-select" tabindex="13">
                                                <option value=""></option>
                                                <optgroup label="NFC EAST">
                                                    <option>Dallas Cowboys</option>
                                                    <option>New York Giants</option>
                                                    <option>Philadelphia Eagles</option>
                                                    <option>Washington Redskins</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Location</label>
                                        <div class="form_input">
                                            <select data-placeholder="Select a Template" style=" width:300px" class="chzn-select" tabindex="13">
                                                <option value=""></option>
                                                <optgroup label="NFC EAST">
                                                    <option>Dallas Cowboys</option>
                                                    <option>New York Giants</option>
                                                    <option>Philadelphia Eagles</option>
                                                    <option>Washington Redskins</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Short Blurb</label>
                                        <div class="form_input">
                                            <textarea name="shortblurb"></textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Funding Goal</label>
                                        <div class="form_input">
                                            <input name="image" type="text" tabindex="2"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Fund Duration</label>
                                        <div class="form_input">
                                            <input name="date" type="text" id="date"/>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset title="Step 2">
                            <legend>Reward</legend>
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Pledge Amount</label>
                                        <div class="form_input">
                                            <input name="pledge" type="text" tabindex="1" class="limiter " style="width:300px"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Description</label>
                                        <div class="form_input">
                                            <textarea name="description" style=" width:300px"></textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Estimated Delivery</label>
                                        <div class="form_input">
                                            <input name="pledge" type="text" tabindex="1" class="limiter " style=" width:300px"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Mask Input</label>
                                        <div class="form_input">
                                            <div class="form_grid_2 alpha">
                                                <input name="date" type="text" id="date" />
                                                <span class=" label_intro">Date</span>
                                            </div>
                                            <div class="form_grid_3">
                                                <input name="phone" type="text" id="phone"/>
                                                <span class=" label_intro">Phone</span>
                                            </div>
                                            <div class="form_grid_2">
                                                <input name="tin" type="text" id="tin"/>
                                                <span class=" label_intro">Tin</span>
                                            </div>
                                            <div class="form_grid_2">
                                                <input name="ssn" type="text" id="ssn"/>
                                                <span class=" label_intro">SSN</span>
                                            </div>
                                            <span class="clear"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                          
                        </fieldset>
                        <fieldset title="Step 3">
                            <legend>Story</legend>
                            <ul>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Project Video</label>
                                        <div class="form_input">
                                            <input name="video" type="file" tabindex="2"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Description</label>
                                        <div class="form_input">
                                            <textarea name="description"></textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Risks & Challenges</label>
                                        <div class="form_input">
                                            <textarea name="risk"></textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset title="Step 4">
                            <legend>About Creator</legend>
                            <ul>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Profile Picture</label>
                                        <div class="form_input">
                                            <input name="profilepic" type="file" tabindex="2"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Name</label>
                                        <div class="form_input">
                                            <input name="username" type="text" tabindex="2"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Biography</label>
                                        <div class="form_input">
                                            <textarea name="biography"></textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title"> Location</label>
                                        <div class="form_input">
                                            <select data-placeholder="Select a Template" style=" width:300px" class="chzn-select" tabindex="13">
                                                <option value=""></option>
                                                <optgroup label="NFC EAST">
                                                    <option>Dallas Cowboys</option>
                                                    <option>New York Giants</option>
                                                    <option>Philadelphia Eagles</option>
                                                    <option>Washington Redskins</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Websites</label>
                                        <div style="width: 65%; min-height: 100px; height: 100%;" id="tags_1_tagsinput" class="tagsinput"><span class="tag"><span>foo&nbsp;&nbsp;</span><a title="Removing tag" href="#">x</a></span><span class="tag"><span>bar&nbsp;&nbsp;</span><a title="Removing tag" href="#">x</a></span><span class="tag"><span>baz&nbsp;&nbsp;</span><a title="Removing tag" href="#">x</a></span><span class="tag"><span>roffle&nbsp;&nbsp;</span><a title="Removing tag" href="#">x</a></span><div id="tags_1_addTag"><input style="color: rgb(102, 102, 102); width: 80px;" id="tags_1_tag" value="" data-default="add a test tag"></div><div class="tags_clear"></div></div>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                        <fieldset title="Step 5">
                            <legend>Account</legend>
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Name</label>
                                        <div class="form_input">
                                            <div class="form_grid_6 alpha">
                                                <input name="firstname" type="text"/>
                                                <span class=" label_intro">First Name</span>
                                            </div>
                                            <div class="form_grid_6 ">
                                                <input name="lastname" type="text"/>
                                                <span class=" label_intro">Last Name</span>
                                            </div>
                                            <span class="clear"></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Rating</label>
                                        <div class="form_input">
                                            <div id="star">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Spinner</label>
                                        <div class="form_input">
                                            <input type="text" class="spinner" id="spinner" value="0"/>
                                            <input type="text" id="spinnerhide" value="0" class="spinner"/>
                                            <input type="text" class="spinner" id="spinnercurrency"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Mask Input</label>
                                        <div class="form_input">
                                            <div class="form_grid_2 alpha">
                                                <input name="date" type="text" id="date"/>
                                                <span class=" label_intro">Date</span>
                                            </div>
                                            <div class="form_grid_3">
                                                <input name="phone" type="text" id="phone"/>
                                                <span class=" label_intro">Phone</span>
                                            </div>
                                            <div class="form_grid_2">
                                                <input name="tin" type="text" id="tin"/>
                                                <span class=" label_intro">Tin</span>
                                            </div>
                                            <div class="form_grid_2">
                                                <input name="ssn" type="text" id="ssn"/>
                                                <span class=" label_intro">SSN</span>
                                            </div>
                                            <span class="clear"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                        <input type="submit" class="finish" value="Finish!"/>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <span class="clear"></span>
</div>
@stop