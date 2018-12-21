$(document).ready(function(){
    sorteados = new Array();

    $('.td-numero').each(function(){
        id = $(this).attr('id');
        //if(sorteados.indexOf(id) == -1){
            sorteados.push(id);
        //}
    });

    sorteados.sort(sortfunction);
    console.log(sorteados);

    for(i = 0; i < sorteados.length; i++){
        $('.td-'+sorteados[i]).addClass('cor-'+i);
    }
});

function sortfunction(a, b){
    return (a - b);
}