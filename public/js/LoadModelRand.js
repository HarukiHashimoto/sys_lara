$('.ref_btn').on('click', LoadModelRand);

function LoadModelRand() {
    $('.ui.modal.ref_modal').modal('show');
    var rnodes = new vis.DataSet([]);
    var redges = new vis.DataSet([]);
    var rcontainer = document.getElementById('refModel');

    var rdata = {
        nodes: rnodes,
        edges: redges
    };

    var rnetwork = new vis.Network(rcontainer, rdata, options);


    (function() {
        var path = location.href.split("/");
        var title = path[path.length-1];
        console.log(title);
        axios.post('loadOthers', {
            title: title,
        })
        .then(function(response) {
            var res = response.data;
            if (res == 0) {
                swal({
                    type: 'error',
                    title: "Not Found!",
                    text: "他の人のモデルは存在しません",
                 });
            }
            var data = JSON.parse(response.data);
            console.log(data);
            addData(rnodes, data.nodes._data);
            addData(redges, data.edges._data);
            temp = tagList;
            rtagList = data.tagList;
            drawTags(rnetwork, rnodes, rtagList);
        })
        .catch(function(error) {
            console.log(error);
        });

    })();

}
