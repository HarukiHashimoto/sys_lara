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

    drawTags(rnetwork);
    (function() {
        axios.get('loadOthers', {
        })
        .then(function(response) {
            var res = response.data;
            var data = JSON.parse(response.data);
            console.log(res);

            addData(rnodes, data.nodes._data);
            addData(redges, data.edges._data);
            temp = tagList;
            tagList = data.tagList;
        })
        .catch(function(error) {
            console.log(error);
        });

    })();


}
