//Quick hack to batch process json transformation.

//ex. usage from cli: node jsonTransform.js ./json/aba_1701-1711.json
// where argument is relative path to json file to be transformed.

const fs = require('fs')
const jsonpatch = require('json-patch');

console.log("transforming...");
let file = process.argv.slice(2)[0];
let filePathParts = file.split('/');
let fileName = filePathParts.pop();
let newFilePath = filePathParts.join('/') + '/transformed_'+fileName;
let pathToOrigFile = process.argv[1].split('jsonTransform.js')[0]+file;
console.log("...file:",pathToOrigFile);

let transformedData = [];
fs.readFile(pathToOrigFile, 'utf8', function (err,data) {
  if (err) {
    return console.log(err);
  }

  let jsonData = JSON.parse(data);
  let len = jsonData.length;
  for(var i =0;i<len;i++){
    //jsonpatch func with given transform rules:
    let transformFunc = jsonpatch.compile( [
     { "op": "add", "path": "/media", "value":{} },
     { "op": "add", "path": "/author", "value":{} },
     { "op": "add", "path": "/recipient", "value":{} },
     { "op": "move", "from": "/type", "path": "/media/type"},
     { "op": "move", "from": "/city", "path": "/media/city"},
     { "op": "move", "from": "/state", "path": "/media/state"},
     { "op": "move", "from": "/country", "path": "/media/country"},
     { "op": "move", "from": "/fileName", "path": "/media/fileName"},
     { "op": "move", "from": "/date", "path": "/media/date"},
     { "op": "move", "from": "/description", "path": "/media/description"},
     { "op": "move", "from": "/source", "path": "/media/source"},
     { "op": "move", "from": "/r_firstName", "path": "/recipient/firstName"},
     { "op": "move", "from": "/r_lastName", "path": "/recipient/lastName"},
     { "op": "move", "from": "/r_pedigree", "path": "/recipient/pedigree"},
     { "op": "move", "from": "/r_type", "path": "/recipient/type"},
     { "op": "move", "from": "/firstName", "path": "/author/firstName"},
     { "op": "move", "from": "/lastName", "path": "/author/lastName"},
     { "op": "move", "from": "/pedigree", "path": "/author/pedigree"}
    ]);
    transformedData.push( transformFunc(jsonData[i]) );
  };

  //console.log("transformedData:",transformedData);
  let transformedDataStr = JSON.stringify(transformedData);
  fs.writeFile(newFilePath, transformedDataStr, function (err) {
    if (err) return console.log(err);
    console.log('file write finished.');
  });

});
