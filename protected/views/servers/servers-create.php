<!-- create part view -->
<div id="servers-create" style="display:none;" class="contact-info plain-list">
    <!-- FORM HERE -->
    <form>
        <!-- CSRF TOKEN HERE -->
        <input type="hidden" id="servers-create-csrf" value="<?php echo Yii::app()->request->csrfToken ?>" />
        <div class="contact-info-details">
            <div class="section primary-info expanded">
                <div id="expand-primary" class="header"><h3><b>Add Server</b></h3></div>
            </div>
            <!--CONTENT for CREATE PROJECT-->
            <div id="edit-primary-content" class="content">
                <div class="field field-input-name">
                <div class="field-secondary"><span class="label">Name*</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-name" type="text" class="text"/>
                        <span id="servers-create-name-error" class="field-input-name-error error-message" style="display: none;"></span>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Type*</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <?php echo ZHtml::enumDropDownList(Servers::model(), 'server_type', array(
                            'id'=>'servers-create-type',
                            'class' => 'select',
                        )); ?>
                        <span id="servers-create-type-error" class="field-input-name-error error-message" style="display: none;"></span>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Host</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-host" type="text" class="text"/>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Public IP</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-public" type="text" class="text"/>
                        <span id="servers-create-public-error" class="field-input-name-error error-message" style="display: none;"></span>
                        </div>
                        <div class="form-note"><i>(Public IP must be unique)</i></div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Private IP</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-private" type="text" class="text"/>
                        <span id="servers-create-private-error" class="field-input-name-error error-message" style="display: none;"></span>
                        </div>
                        <div class="form-note"><i>(Private IP + Network combination must be unique)</i></div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Network*</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-network" type="text" class="text"/>
                        <span id="servers-create-network-error" class="field-input-name-error error-message" style="display: none;"></span>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Location</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-location" type="text" class="text"/>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Description</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <textarea id="servers-create-description" rows="4" class="text"></textarea>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Production Date</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-production" type="text" class="text"/>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="field field-input-name">
                    <div class="field-secondary"><span class="label">Termination Date</span></div>
                    <div class="field-primary">
                        <div class="pseudo-field">
                        <input id="servers-create-termination" type="text" class="text"/>
                        </div>
                    </div><!-- End Field Primary -->
                </div><!-- End Field -->
                <div class="dialog-footer-block">
                    <div class="field field-text">
                        <div class="field-action-content">
                            <div class="pseudo-field pseudo-button">
                                <a id="servers-create-cancel-button" class="cancel" href="#">Cancel</a>
                            </div>
                            <div class="pseudo-field pseudo-button primary-button">
                                <button id="servers-create-save-button">Create</button>
                            </div>
                        </div><!-- End Field Action Content -->
                    </div><!-- End Field Action -->
                </div><!-- End UI Dialog Footer Block -->
            </div>
            <!--END CREATE CONTENT PROJECT-->
        </div>
    </form>
</div><!--END create project-->