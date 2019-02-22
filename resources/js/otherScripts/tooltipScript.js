$(function () {
        $('[data-toggle="tooltip"]').tooltip();
    
        $('[data-toggle="tooltip"]').on("hidden.bs.tooltip", function(){
            let alert = $('<div class="alert alert-primary" role="alert"> Se ha cerrado el tooltip</div>');
            $('[data-toggle="tooltip"]').parent().append(alert);
        });

        $('[data-toggle="popover"]').popover({
                trigger: "hover",
        });

});