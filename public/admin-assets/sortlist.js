/**
 * !!! IMPORTANT !!!
 * REQUIRED VARIABLES:
 * - update_order_route
 * - csrf_token
 */
slist(document.getElementById("sortlist"));
function updateOrder() {
    let sections = document.getElementById('sortlist').children
    let res = [];
    for (const section of sections) {
        res.push({"id": section.value})
    }
    $.ajax({
        url: update_order_route,
        method: 'post',
        data: {
            "_token": csrf_token,
            "_method": "PUT",
            "items": res
        },
        success: (data) => {
            location.reload()
        }
    })
}
