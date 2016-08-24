$(document).ready(function(){
    //delete status
    $('.segment').hide().transition({
        animation : 'drop',
        duration  : 100,
        interval  : 200
    });
    $('.btn-delete').hide();
    $(".delete").click(function(){
        
        $('.btn-delete').show();
        $('.btn-delete').transition('set looping')
                         .transition('shake');
        $('.btn-delete').click(function(){
                    $news_id = $(this).attr("id");
                    console.log($news_id);
            $('.ui.basic.modal').modal('show'); 
            $('.delete_news').click(deleteclick);


            function deleteclick(){
                delete_news($news_id);
            }
            function delete_news(news_id){
                    
                    $.ajax({
                        url: 'postdelete',
                        type: 'POST',
                        data: {
                            news_id: news_id
                        },
                        success: function() {
                        
                            $('.ui.basic.modal').modal('hide');
                            $("#news_" + news_id).slideUp('slow');                            
                        },
                        error: function() {
                             //Ajax not successful: show an error
                            alert('An error occured while deleting the status!');
                        }
                     });
                }
            });
        });                 
                
    });