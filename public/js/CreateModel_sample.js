// console.log(model.link_list[1].factor1);
// create an array with nodes

function getUniqueStr(myStrong){
 var strong = 1000;
 if (myStrong) strong = myStrong;
 return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
};

var nodes = new vis.DataSet([]);


// create an array with edges
var edges = new vis.DataSet([]);

// create a network
var container = document.getElementById('mymodel_s');

// provide the data in the vis format
var data = {
    nodes: nodes,
    edges: edges
};

var options = {
    nodes: {
        color: '#e7e7e7',
        margin: {
            top: 80
        },
        widthConstraint: {
            minimum: 200
        },
    },
    edges: {
        arrows: 'to',
    },
    physics: {
        // enabled: false,
        barnesHut: {
            centralGravity: 0.01,
            springLength: 400,
        },
        timestep:0.3
    },
    groups: {
        given: {
            shape: 'elipse',
            color: '#5cb6ff',
            font: {
                'size': 20
            },
            widthConstraint: {
                minimum: 200
            },
        },
        usr_node: {
            shape: 'elipse',
            color: '#d2ffcc',
            font: {
                'size': 20
            }
        },
        instance: {
            shape: 'box',
            color: '#d4b5e0',
            font: {
                'align': 'left',
                'size': 20
            },
	    margin: 5,
            heightConstraint: {
                minimum: 100,
                valign: 'bottom',
            },
	    shapeProperties: {
		borderDashes: false, // only for borders
	    },
        },
        state: {
            shape: 'box',
            color: '#bfbfbf',
            font: {
                'align': 'left',
                'size': 20
            },
	    margin: 5,
            heightConstraint: {
                minimum: 100,
                valign: 'bottom',
            },
	    shapeProperties: {
		borderDashes: false, // only for borders
	    },

        },
    },
    manipulation: {
      addNode: function (data, callback) {
        // filling in the popup DOM elements
        document.getElementById('node-operation').innerHTML = "Add Node";
        editNode(data, callback);
      },
      editNode: function (data, callback) {
        // filling in the popup DOM elements
        document.getElementById('node-operation').innerHTML = "Edit Node";
        editNode(data, callback);
      },
      addEdge: function (data, callback) {
        if (data.from == data.to) {
          var r = confirm("Do you want to connect the node to itself?");
          if (r != true) {
            callback(null);
            return;
          }
        }
        document.getElementById('edge-operation').innerHTML = "Add Edge";
        editEdgeWithoutDrag(data, callback);
      },
      editEdge: {
        editWithoutDrag: function(data, callback) {
          document.getElementById('edge-operation').innerHTML = "Edit Edge";
          editEdgeWithoutDrag(data,callback);
        }
      }
    }
};

// initialize your network!
var network = new vis.Network(container, data, options);

var tagList = {
    "data": [
        {
            "id": "",
            "tag": []
        },
    ]
};

function editNode(data, callback) {

  document.getElementById('node-id').value = data.id;
  console.log(data.id);
  document.getElementById('node-label').value = data.label;
  console.log(document.getElementById('group').value);
  document.getElementById('group').value = data.group;
  document.getElementById('node-saveButton').onclick = saveNodeData.bind(this, data, callback);
  document.getElementById('node-cancelButton').onclick = clearNodePopUp.bind();
  document.getElementById('node-popUp').style.display = 'block';
};

function clearNodePopUp() {
  document.getElementById('node-saveButton').onclick = null;
  document.getElementById('node-cancelButton').onclick = null;
  document.getElementById('node-popUp').style.display = 'none';
};

function cancelNodeEdit(callback) {
  clearNodePopUp();
  callback(null);
};

function saveNodeData(data, callback) {
  data.id = document.getElementById('node-id').value;
  data.label = document.getElementById('node-label').value;
  data.group = document.getElementById('group').value;

  console.log(data);
  clearNodePopUp();
  callback(data);
};

function editEdgeWithoutDrag(data, callback) {
  // filling in the popup DOM elements
  var label = document.getElementsByName('pon');
  for (var i = 0; i < label.length; i++) {
      if (label[i].checked) {
          if(label[i].value == 1) {
              data.color = {color:'blue'};
          } else if(label[i].value == 2) {
              data.color = {color:'red'};
          } else {
              data.color = {color:'#747474'};
          }
      }
  }
  document.getElementById('edge-saveButton').onclick = saveEdgeData.bind(this, data, callback);
  document.getElementById('edge-cancelButton').onclick = cancelEdgeEdit.bind(this,callback);
  document.getElementById('edge-popUp').style.display = 'block';
};

function clearEdgePopUp() {
  document.getElementById('edge-saveButton').onclick = null;
  document.getElementById('edge-cancelButton').onclick = null;
  document.getElementById('edge-popUp').style.display = 'none';
};

function cancelEdgeEdit(callback) {
  clearEdgePopUp();
  callback(null);
};

function saveEdgeData(data, callback) {
  if (typeof data.to === 'object')
    data.to = data.to.id
  if (typeof data.from === 'object')
    data.from = data.from.id
  var label = document.getElementsByName('pon');
  for (var i = 0; i < label.length; i++) {
      if (label[i].checked) {
          if(label[i].value == 1) {
              data.color = {color:'blue'};
          } else if(label[i].value == 2) {
              data.color = {color:'red'};
          } else {
              data.color = {color:'#747474'};
          }

      }
  }

  clearEdgePopUp();
  console.log(edges._data);
  console.log(nodes._data);

  callback(data);
};

$('.q_list').on('click', genQnode);

function genQnode() {
    label = this.textContent;
    title = this.id;
    nodes.add([
        {label: label, group: "instance", title: title}
    ]);
    drawTags(network, nodes, tagList);
    network.redraw();
};

$('body').on('load', function init() {
  setDefaultLocale();
  drawTags(network, nodes, tagList);
  draw();
});

// タグを格納する配列
var tag = {
    "data": [
        {
            'name': '提案',
            'color': '#FFFC79',
        },
        {
            'name': '指針',
            'color': '#bf85d7'
        },
        {
            'name': '結論',
            'color': '#D6D6D6'
        },
        {
            'name': '問題',
            'color': '#7A81FF'
        },
        {
            'name': '関与者',
            'color': '#C0E9FF'
        },
        {
            'name': '懸念',
            'color': '#ffa8a8'
        },
        {
            'name': '問い',
            'color': '#4BE64A'
        },
        {
            'name': '答え',
            'color': '#F9AE64'
        }
    ]
};



$('.tag').on('click', addTag);

function addTag() {
    var selectedId = network.getSelectedNodes()[0];
    var tagId = this.value;
    console.log(tagList);
    console.log(selectedId);
    var flag = 0;
    if (selectedId) {
        for (var i = 0; i < tagList.data.length; i++) {
            var tags = tagList.data[i].tag;
            console.log(tags);
            if (tagList.data[i].id == selectedId) {
                /**
                 * 配列内に指定の要素があれば要素番号を返す．
                 * なければ[-1]を返す
                 * @type number
                 */
                var res = tags.indexOf(tagId);
                console.log(res);

                if (res != -1) {    //  クリックされたタグがすでに付与されているものなら削除する
                    console.log(tags);
                    tags.splice(res,1);
                    console.log(tags);
                    tagList.data[i].tag = tags;
                    network.redraw();
                    flag = 1;

                } else {    //  タグがないなら追加する
                    tags.push(tagId);
                    tagList.data[i].tag = tags;
                    network.redraw();
                    flag = 2;
                }
            }
        }
        if (flag == 0) {
            console.log("FLAG:"+flag);
            console.log(tagId);
            tagList.data[i] = {"id": selectedId, "tag": [tagId]}
            console.log(tagList.data);
            network.redraw();
        }
    }
    drawTags(network, nodes, tagList);
};

// タグの描画部分
drawTags(network, nodes, tagList);
function drawTags(netName, nodes, tagList) {
    netName.on("afterDrawing", function (ctx) {
        if(nodes) {
            var haveTag = [];
            // console.log('length:'+nodes.length);
            for (var i in nodes._data) {
                // console.log(nodes._data[i]);
                // console.log(nodes._data[i].group);
                if (nodes._data[i] !== undefined) {
                    // console.log(nodes._data[i]);
                    if(nodes._data[i].group == 'instance' || nodes._data[i].group == 'state') {
                        haveTag.push(nodes._data[i].id);
                        // console.log('Tagsありノード'+nodes._data[i].id);
                    } else {
                        // console.log('Tags無いよ');
                    }
                } else {
                    // console.log(i+'undefined');
                    i--;
                }
            }
            // console.log(i);
        }
        // console.log('Tags長さ'+haveTag.length);
        for (var i = 0; i < haveTag.length; i++) {
            // console.log('length_tag'+haveTag[i]);
            var nodeId = haveTag[i];
            var nodePosition = netName.getPositions([nodeId]);
            var tagPosition = netName.getBoundingBox(nodeId);

            // 初期値の設定
            var x = 55;
            var y = 10;
            var width = 45;
            var height = 25;

            // console.log("ID: "+nodeId);

            for (var j = 0; j < 8; j++) {
                ctx.fillStyle = '#f7f7f7';
                ctx.fillRect(tagPosition.right-x, tagPosition.top+y, width, height);
                ctx.fill();

                x = x + 50;
                // 下段
                if (j == 3) {
                    x = 55;
                    y = y + 30;
                }
            }
            // console.log(tagList);

            for (var j in tagList.data) {
                // console.log(j);
                // 初期値の設定
                var x = 55;
                var y = 10;
                var width = 45;
                var height = 25;
                if(tagList.data[j].id == nodeId) {
                    // console.log(tagList.data[j].tag.length);
                    for (var k = 0; k < tagList.data[j].tag.length; k++) {
                        clrId = tagList.data[j].tag[k];
                        ctx.fillStyle = tag.data[clrId].color;
                        ctx.fillRect(tagPosition.right-x, tagPosition.top+y, width, height);
                        ctx.fill();

                        // テキストの挿入
                        ctx.font = "bold 15px sans-serif";
                        ctx.textAlign = "center";
                        ctx.fillStyle = '#000000';
                        ctx.fillText(tag.data[clrId].name, (tagPosition.right-x+25), (tagPosition.top+y+15));

                        x = x + 50;
                        // console.log("j:"+k);
                        // 下段
                        if (k == 3) {
                            x = 55;
                            y = y + 30;
                        }
                    }
                }
            }
        }
    });
};


// $('.vis-delete').on('click', delNode);
// function delNode() {
//     // selectedId = network.getSelectedNodes()[0];
//     console.log("aaaaaaa");
// }

// axion使用
$('.save_btn').on('click', saveJSON);

function saveJSON() {
    var path = location.href.split("/");
    var title = path[path.length-1];
    axios.post('save', {
        nodes: nodes,
        edges: edges,
        tagList: tagList,
        title: title
    })
    .then(function(response) {
        console.log(response);
    })
    .catch(function(error) {
        console.log(error);
    });
};

var putParam = function(param) {
    // console.log(param);
};

var a = loadJSON(putParam);

function loadJSON(callback) {
    var path = location.href.split("/");
    var title = path[path.length-1];
    // console.log(title);
    var res;
    var res = axios.post('load', {
        title: title
    })
    .then(function(response) {
        var res = response.data;
        var data = JSON.parse(response.data);
        // console.log(data[0]);
        //
        //

        if(data[1].id == "") {
            addData(nodes, data[0].nodes._data);
            addData(edges, data[0].edges._data);
            // console.log(data[1]);
        } else {
            addData(nodes, data[1].nodes._data);
            addData(edges, data[1].edges._data);
            tagList = data[1].tagList;
            // タグの描画
            drawTags(network, nodes, tagList);
        }
        callback(res);
    })
    .catch(function(error) {
        console.log(error);
    });

    network.redraw();
};

/**
 *
 * @param {[DataSet]} target [description]
 * @param {[JSON]} data   [description]
 */
function addData(target, data) {
    for (var i in data) {
        target.add(data[i]);
        console.log(data[i]);
    }
};
