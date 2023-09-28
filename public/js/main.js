jQuery(document).ready(function ($) {
    $(".btn-create").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        var data = {
            name: $(this).siblings(".name").val(),
        };

        var type = $(this).data("type");

        if (type === "department") {
            var company_id = $(this).data("company-id");
            data.company_id = company_id;
        } else if (type === "team") {
            var company_id = $(this).data("company-id");
            var department_id = $(this).data("department-id");
            data.company_id = company_id;
            data.department_id = department_id;
        } else if (type === "employee") {
            var company_id = $(this).data("company-id");
            var department_id = $(this).data("department-id");
            var team_id = $(this).data("team-id");
            data.company_id = company_id;
            data.department_id = department_id;
            data.team_id = team_id;
        }

        $.ajax({
            type: "POST",
            url: "/api/" + type,
            data: data,
            dataType: "json",
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {},
        });
    });

    $(".btn-swap").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        var data = {
            id: $(this).data("id"),
            swap_id: $(this).data("swap-id"),
            type: $(this).data("type"),
        };

        $.ajax({
            type: "POST",
            url: "/api/swap",
            data: data,
            dataType: "json",
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {},
        });
    });

    $(".btn-delete").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        var id = $(this).data("id");
        var type = $(this).data("type");

        $.ajax({
            type: "DELETE",
            url: "/api/" + type + "/" + id,
            dataType: "json",
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {},
        });
    });

    $(".btn-attendance").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        var data = {
            employee_id: $(this).data("employee-id"),
            type: $(this).data("type"),
        };

        $.ajax({
            type: "POST",
            url: "/api/attendance",
            data: data,
            dataType: "json",
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {},
        });
    });

    $(".btn-search").click(function (e) {
        
        var date = $(this).siblings(".input-date").val();

        var urlParams = new URLSearchParams(window.location.search);

        urlParams.set("date", date);
    
        var newUrl = window.location.pathname + '?' + urlParams.toString();
    
        window.location.href = newUrl;
    });
});
