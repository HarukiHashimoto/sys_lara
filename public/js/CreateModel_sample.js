2525// console.log(model.link_list[1].factor1);
// create an array with nodes

function getUniqueStr(myStrong){
 var strong = 1000;
 if (myStrong) strong = myStrong;
 return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
}

var nodes = new vis.DataSet([
    {id: 0, label: '治安', group: 'pre_node'},
    {id: 1, label: '外国人', group: 'pre_node'},
    {id: 2, label: 'アクセス', group: 'pre_node'},
    {id: 3, label: '税収', group: 'pre_node'},
    // {id: 4, label: '雇用', group: 'pre_node'},
    // {id: 5, label: '所得税', group: 'pre_node'},
    // {id: 100, label: '\n人口減少', group: 'usr_node'},
    // {id: 101, label: '\n労働力不足', group: 'usr_node'},
    // {id: 102, label: '公共投資', group: 'usr_node'},
    // {id: 103, label: '移住者', group: 'usr_node'},
    {id: 4, label: "\n\n\n共通話題・異文化理解のためにマンガミュージアムを作る", group: 'state'},
    {id: 5, label: '\n\n\n英語教育に重点的に\n予算を配分する', group: 'state'},
    {id: 6, label: '\n\n\n景気を優先する', group: 'state'},
    // {id: 1003, label: '\n\nIRを誘致する', group: 'state'},
    // {id: 1004, label: '\n\n将来世代', group: 'state'},
    // {id: 1005, label: '\n\n英語でコミュニケー\nションが取れない', group: 'state'},
    {id: 7, label: '\n\n\n外国人にとって\n住みやすくするには？\n\n', group: 'instance'},
    {id: 8, label: '\n\n\n日本人が外国人と\n共生するには？\n\n', group: 'instance'},
    // {id: 1102, label: '\n\n将来世代に還元できる\n政策は？\n\n', group: 'instance'},
    // {id: 1103, label: '\n\n「将来世代」に負担\nを強いることになるのでは？\n\n', group: 'instance'},
    // {id: 1104, label: '\n\n治安と景気のどちらを\n優先させますか？\n\n', group: 'instance'},
    // {id: 1105, label: '\n\n誰が支払うのですか？\n\n', group: 'instance'},
    // {id: 2000, label: '提案', group: 'tag_1'},
    // {id: 2001, label: '提案', group: 'tag_1'},
    // {id: 2002, label: '指針', group: 'tag_2'},
    // {id: 2003, label: '結論', group: 'tag_3'},
    // {id: 2004, label: '問題', group: 'tag_4'},
    // {id: 2005, label: '問題', group: 'tag_4'},
    // {id: 2006, label: '問題', group: 'tag_4'},
    // {id: 2007, label: '関与者', group: 'tag_5'},
    // {id: 2009, label: '関与者', group: 'tag_5'},
    // {id: 2008, label: '懸念', group: 'tag_6'},
    // {id: 2010, label: '問い', group: 'tag_7'},
    // {id: 2011, label: '問い', group: 'tag_7'},
    // {id: 2012, label: '問い', group: 'tag_7'},
    // {id: 2013, label: '問い', group: 'tag_7'},
    // {id: 2014, label: '問い', group: 'tag_7'},
    // {id: 2015, label: '問い', group: 'tag_7'},
    // {id: 2016, label: '答え', group: 'tag_8'},
    // {id: 2017, label: '答え', group: 'tag_8'},
    // {id: 2018, label: '答え', group: 'tag_8'},
    // {id: 2019, label: '答え', group: 'tag_8'},
    // {id: 2020, label: '答え', group: 'tag_8'},
    // {id: 3000, label: 'V-b', group: 'tag_q'},
    // {id: 3001, label: 'V-c', group: 'tag_q'},
    // {id: 3002, label: 'V-c', group: 'tag_q'},
    // {id: 3003, label: 'Ⅴ-c', group: 'tag_q'},
    // {id: 3004, label: 'Ⅶ-a', group: 'tag_q'},
    // {id: 3005, label: 'Ⅶ-b', group: 'tag_q'},
]);



// create an array with edges
var edges = new vis.DataSet([
]);

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
        margin: 10,
        widthConstraint: {
            minimum: 200
        },
    },
    edges: {
        arrows: 'to',
    },
    physics: {
        // enabled: false,
        "timestep": 1,
    },
    groups: {
        'pre_node': {
            shape: 'elipse',
            color: '#5cb6ff',
            font: {
                'size': 20
            },
            widthConstraint: 50,
        },
        'usr_node': {
            shape: 'elipse',
            color: '#d2ffcc',
            font: {
                'size': 20
            }
        },
        'instance': {
            shape: 'box',
            color: '#d4b5e0',
            font: {
                'align': 'left',
                'size': 20
            },
        },
        'state': {
            shape: 'box',
            color: '#bfbfbf',
            font: {
                'align': 'left',
                'size': 20
            }
        },
        'tag_1': {
            shape: 'box',
            color: '#FFFC79'
        },
        'tag_2': {
            shape: 'box',
            color: '#bf85d7'
        },
        'tag_3': {
            shape: 'box',
            color: '#D6D6D6'
        },
        'tag_4': {
            shape: 'box',
            color: '#7A81FF'
        },
        'tag_5': {
            shape: 'box',
            color: '#C0E9FF'
        },
        'tag_6': {
            shape: 'box',
            color: '#ffa8a8'
        },
        'tag_7': {
            shape: 'box',
            color: '#4BE64A'
        },
        'tag_8': {
            shape: 'box',
            color: '#F9AE64'
        },
        'tag_q': {
            shape: 'box',
            color: '#404040',
            font: {
                color: '#dfdfdf'
            }
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

function editNode(data, callback) {
  document.getElementById('node-label').value = data.label;
  document.getElementById('group').value = data.group;
  document.getElementById('node-saveButton').onclick = saveNodeData.bind(this, data, callback);
  document.getElementById('node-cancelButton').onclick = clearNodePopUp.bind();
  document.getElementById('node-popUp').style.display = 'block';
}

function clearNodePopUp() {
  document.getElementById('node-saveButton').onclick = null;
  document.getElementById('node-cancelButton').onclick = null;
  document.getElementById('node-popUp').style.display = 'none';
}

function cancelNodeEdit(callback) {
  clearNodePopUp();
  callback(null);
}

function saveNodeData(data, callback) {
  data.label = document.getElementById('node-label').value;
  data.group = document.getElementById('group').value;

  clearNodePopUp();
  callback(data);
}

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
}

function clearEdgePopUp() {
  document.getElementById('edge-saveButton').onclick = null;
  document.getElementById('edge-cancelButton').onclick = null;
  document.getElementById('edge-popUp').style.display = 'none';
}

function cancelEdgeEdit(callback) {
  clearEdgePopUp();
  callback(null);
}

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
  callback(data);
}

$('body').on('load', function init() {
  setDefaultLocale();
  draw();
});

network.on("click", function(params) {
    console.log(params);
    nodeId = params.nodes[0];
    console.log(nodeId);
    nodePosition = network.getPositions([nodeId]);

    $('.tag').on('click', function() {
        console.log(nodeId);
        console.log(this.textContent);
        id = nodeId + this.value;
        label = this.textContent;
        group = this.value;
        console.log(nodeId);
        nodes.add([
            {
                id: id,
                label: label,
                group: group,
                physics: true,
                // x: nodePosition[nodeId].x,
                // y: nodePosition[nodeId].y,
            }
        ]);
        edges.add([
            {
                from: id,
                to: nodeId,
                physics: true,
                arrows: {
                    to: {
                        type: 'circle',
                        scaleFactor: 0.5,
                    },
                }
            }
        ]);
    });
});

$('.q_list').on('click', genQnode);

function genQnode() {
    id = this.id +"-"+ getUniqueStr();
    label = this.textContent;
    nodes.add([
        {id: id, label: label, group: "instance"}
    ]);
}

  // network.on("initRedraw", function () {
    // do something like move some custom elements?
  // });
  // network.on("beforeDrawing", function (ctx) {
  //   var nodeId = 1;
  //   var nodePosition = network.getPositions([nodeId]);
  //   ctx.strokeStyle = '#A6D5F7';
  //   ctx.fillStyle = '#294475';
  //   ctx.circle((nodePosition[nodeId].x), (nodePosition[nodeId].y),50);
  //   ctx.fill();
  //   ctx.stroke();
  // });

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
console.log(tag.data[0].color);

var tagList = {
    "data": [
        {
            "id": 4,
            "tag": [1, 3, 5]
        },
        {
            "id": 5,
            "tag": [2, 4]
        },
    ]
};

// タグの描画部分
network.on("afterDrawing", function (ctx) {
    if(nodes) {
        var haveTag = [];
        for (var i = 0; i < nodes.length; i++) {
            if(nodes._data[i].group == 'instance' || nodes._data[i].group == 'state') {
                haveTag.push(nodes._data[i].id);
            }
        }
    }

    for (var i = 0; i < haveTag.length; i++) {
        var nodeId = haveTag[i];
        var nodePosition = network.getPositions([nodeId]);
        var tagPosition = network.getBoundingBox(nodeId);

        // 初期値の設定
        var x = 55;
        var y = 10;
        var width = 45;
        var height = 25;
        var j = 0;

        console.log("ID: "+nodeId);

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

        for (var j = 0; j < tagList.data.length; j++) {

            // 初期値の設定
            var x = 55;
            var y = 10;
            var width = 45;
            var height = 25;
            if(tagList.data[j].id == nodeId) {
                console.log(tagList.data[j].tag.length);
                for (var k = 0; k < tagList.data[j].tag.length; k++) {
                    clrId = tagList.data[j].tag[k];
                    ctx.fillStyle = tag.data[clrId].color;
                    ctx.fillRect(tagPosition.right-x, tagPosition.top+y, width, height);
                    ctx.fill();

                    x = x + 50;
                    // 下段
                    if (j == 3) {
                        x = 55;
                        y = y + 30;
                    }
                }
            }
        }
    }


    // // テキストの挿入
    // ctx.font = "bold 15px sans-serif";
    // ctx.textAlign = "center";
    // ctx.fillStyle = '#000000';
    // ctx.fillText('提案', (tagPosition.right-30), (tagPosition.top+25));
});
