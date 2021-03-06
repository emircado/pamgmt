<div id="confirmation-modal" class="dialog-box module" style="display: none;">
    <div class="dialog-container">
        <div class="dialog-content">
            <form action="">
                <div class="dialog-header-block">
                    <h3 id="modal-title">Confirm Action</h3>
                    <a href="#" class="close-dialog" id="close-modal" title="Close"><span class="icon"></span></a>
                </div>
                
                <div class="dialog-content-block">
                    <div class="form module">
                        <span id="modal-message"></span>
                        <div id="modal-for-server" style="display:none;">
                            <div style="float:left;">
                                Server ID:<br/>
                                Name:<br/>
                                Private IP:<br/>
                                Public IP:<br/>
                                Type:<br/>
                                Network:<br/>
                                Description:
                            </div>
                            <div style="float:left;margin-left:10px;min-width:200px">
                                <span id="notice-id"></span><br/>
                                <span id="notice-name"></span><br/>
                                <span id="notice-private"></span><br/>
                                <span id="notice-public"></span><br/>
                                <span id="notice-type"></span><br/>
                                <span id="notice-network"></span><br/>
                                <span id="notice-description"></span>
                            </div>
                        </div>
                        <div class="dialog-footer-block">
                            <div class="field field-text" style="margin:0px;">
                                <div class="field-action-content">
                                    <div class="pseudo-field pseudo-button">
                                        <a id="button-cancel-modal" class="cancel" href="#">Cancel</a>
                                    </div>
                                    <div class="pseudo-field pseudo-button primary-button">
                                        <button id="button-confirm-modal">Confirm</button>
                                    </div>
                                </div><!-- End Field Action Content -->
                            </div><!-- End Field Action -->
                        </div><!-- End UI Dialog Footer Block -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>