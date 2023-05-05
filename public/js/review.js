$(document).ready(function() {

    let productId = $('#product-id').val();

    getReviewsData()

    let sortableFields = {
        rate:{
            field:'rate',
            order: 'asc',
        },
        createdAt:{
            field:'created_at',
            order: 'asc',
        }
    }

    $(".sortable").click(function(){

        let field = $(this).data('field')
        let sortedData = sortableFields[field]
        sortedData.id = productId


        $.ajax({
            url: '/review',
            type: 'GET',
            dataType: 'json',
            data:sortedData,
            success: function(reviews){

                renderReviewTable(reviews)

                sortedData.order = sortedData.order === 'desc'?'asc':'desc'

            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });

    });

    function getReviewsData(){

        $.ajax({
            url: '/review',
            type: 'GET',
            dataType: 'json',
            data: {
                id:productId
            },
            success: function(reviews){

                renderReviewTable(reviews)

            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });

    }

    function renderReviewTable( reviews ){
        let reviewsContainer =  $('#reviews-container');

        reviewsContainer.html('')

        let tableRows = '';

        $.each( reviews, function ( index,review ){

            tableRows += '<tr>'

            tableRows += '' +
                '<th scope="row">' + review.user.name + '</th>' +
                '<th scope="row">' + review.user.email + '</th>' +
                '<th scope="row">' + review.rate + '</th>' +
                '<th scope="row">' + review.comment + '</th>' +
                '<th scope="row">' + review.created_at + '</th>'

            tableRows += '<tr>'

        })

        reviewsContainer.append(tableRows)
    }

});
