/*!
 * This file is a part of Mibew Big Close Button Plugin
 *
 * Copyright 2021 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function big_close_button() {
    if ($('#send-message').length) {
        if (!$('#big-close-button').length) {
            $('#send').append('<a id="big-close-button" class="submit-button" href="javascript:void(0)" title="' + Mibew.Localization.trans('Close chat') + '">' + Mibew.Localization.trans('Close') + '</a>');
            $('#big-close-button').on('click', function() { big_close_button_action(); });
        }
    }
}
$(document).ready(function(){
    big_close_button();
    $('#main-region').bind('DOMSubtreeModified', function(e) {
        if (e.target.innerHTML.length > 0) {
            big_close_button();
        }
    });
});
