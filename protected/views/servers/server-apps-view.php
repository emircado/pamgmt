<!-- view server-apps view -->
<div id="server-apps-view" class="contact-info plain-list" style="display:none;">
    <!-- CONTENT HERE -->
    <div id="details-projects-view">
        <form>
            <input type="hidden" id="server-apps-view-csrf" value="<?php echo Yii::app()->request->csrfToken ?>" />
            <div class="contact-info-details">
                <div class="section primary-info expanded">
                    <div id="expand-primary" class="header">
                        <h3><b>Application Details</b></h3>&nbsp&nbsp
                        <a id="server-apps-view-edit-button" href="#">[Edit]</a>
                        <a id="server-apps-view-delete-button" href="#" style="float:right;">[Delete]</a>
                    </div>
                </div>
                <div id="edit-primary-content" class="content">
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Name</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-name"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Type</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-type"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Accessibility</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-accessibility"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Repository</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-repository"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Uses Mobile Patterns</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-pattern"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Description</span></div>
                        <div class="field-primary">
                            <div id="server-apps-view-description" class="pseudo-field no-border">
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Instructions</span></div>
                        <div class="field-primary">
                            <div id="server-apps-view-instructions" class="pseudo-field no-border">
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">R<?php echo htmlentities("&"); ?>D Point Person</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-pointperson"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Production Date</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-production"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Termination Date</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-termination"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Date Created</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-created"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Created by</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-createdby"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Date Updated</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-updated"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Updated by</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-updatedby"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Application Path</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-path"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <div class="field field-input-name">
                        <div class="field-secondary"><span class="label">Application Log</span></div>
                        <div class="field-primary">
                            <div class="pseudo-field no-border">
                                <span class="value" id="server-apps-view-log"></span>
                            </div>
                        </div><!-- End Field Primary -->
                    </div><!-- End Field -->
                    <a id="server-apps-view-back-button" href="#">[Back]</a>
                </div>

                <div style="padding:10px;">
                </div>
            </div>
        </form>
        <?php
            $this->renderPartial('//applications/application-notes');
        ?>
    </div>
    <div class="right-panel">
        <?php
            $this->renderPartial('//applications/application-servers');
            $this->renderPartial('//applications/application-point-persons');
        ?>
    </div>
</div>