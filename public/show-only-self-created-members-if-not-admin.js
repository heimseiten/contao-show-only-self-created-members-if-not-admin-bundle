document.addEventListener("DOMContentLoaded", function(event) {

    // The marker div (rendered via TL_MOOTOOLS for logged-in backend users) is the single
    // source of truth. The selector MUST include [data-userid]: on edit pages the user_id
    // WIDGET also carries the class "user_id" and would match a plain ".user_id" query.
    var marker = document.querySelector('.user_id[data-userid]')

    if (!marker) {
        // No marker (e.g. not logged in) – do not apply any filtering, show page as-is.
        document.querySelector('body').classList.add('page_other')
        return
    }

    var userId = marker.getAttribute('data-userid')

    if (marker.getAttribute('data-useradmin') == 'isadmin1') {
        document.querySelector('body').classList.add('is_admin')
    } else {

        // Show only member groups named userid_1, userid_32 and so forth
        if ( document.querySelector('#pal_amg_legend #ctrl_amg label') ) {
            document.querySelectorAll('#pal_amg_legend #ctrl_amg label').forEach(element => {
                if ( element.innerHTML == 'userid_' + userId ) {
                    element.style.display = 'inline-block'
                    element.previousElementSibling.style.display = 'inline-block'
                }
            })
        }

        if ( document.querySelector('form#tl_member #ctrl_groups .sortable span') ) {
            document.querySelectorAll('form#tl_member #ctrl_groups .sortable span').forEach(element => {
                if ( element.querySelector('label').innerHTML == 'userid_' + userId ) {
                    element.style.display = 'inline-block'
                }
            })
        }

        if (window.location.href.indexOf("do=member") > -1) {
            var searchSelect = document.querySelector('.content .tl_formbody .tl_search.tl_subpanel .tl_select')
            var searchInput  = document.querySelector('.content .tl_formbody .tl_search.tl_subpanel input.tl_text')
            var applyButton  = document.querySelector('.tl_submit_panel.tl_subpanel .filter_apply')

            if (!searchSelect || !searchInput || !applyButton) {
                // Search panel missing – fail closed (listing stays hidden) instead of crashing.
                return
            }

            if ( searchInput.value != 'userid_' + userId || searchSelect.value != 'user_id' ) {
                searchSelect.value = 'user_id'
                searchInput.value = 'userid_' + userId
                applyButton.click()
            } else {
                document.querySelector('body').classList.add('page_member_filtered')
            }

        } else {
            document.querySelector('body').classList.add('page_other')
        }

    }

})
