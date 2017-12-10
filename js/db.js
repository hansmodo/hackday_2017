import Dexie from './lib/dexie';
import * as Biblio from './data/bibliography';
import * as AAB from './data/aab';
import * as ABA from './data/aba';
import * as ALG from './data/alg';
import * as ALH from './data/alh';
import * as ANJ from './data/anj';
import * as BEA from './data/bea';
import * as BEN from './data/ben';
import * as BET from './data/bet';
import * as CHL from './data/chl';
import * as COR from './data/cor';
import * as DOL from './data/dol';
import * as DSL from './data/dsl';
import * as DUF from './data/duf';
import * as EKS from './data/eks';
import * as ESB from './data/esb';
import * as EZW from './data/ezw';
import * as FEA from './data/fea';
import * as FRD from './data/frd';
import * as GBM from './data/gbm';
import * as GWA from './data/gwa';
import * as HBS from './data/hbs';
import * as HEC from './data/hec';
import * as HWH from './data/hwh';
import * as ISP from './data/isp';
import * as JAM from './data/jam';
import * as JAS from './data/jas';
import * as JCC from './data/jcc';
import * as JEB from './data/jeb';
import * as JED from './data/jed';
import * as JHF from './data/jhf';
import * as JJT from './data/jjt';
import * as JML from './data/jml';
import * as JOA from './data/joa';
import * as JOB from './data/job';
import * as JOD from './data/jod';
import * as JOJ from './data/joj';
import * as JOL from './data/jol';
import * as JOS from './data/jos';
import * as JPJ from './data/jpj';
import * as JQA from './data/jqa';
import * as JQW from './data/jqw';
import * as JRL from './data/jrl';
import * as JSU from './data/jsu';
import * as LAF from './data/laf';
import * as LUL from './data/lul';
import * as MAD from './data/mad';
import * as MBC from './data/mbc';
import * as MNC from './data/mnc';
import * as MTL from './data/mtl';
import * as NAG from './data/nag';
import * as NIB from './data/nib';
import * as PAH from './data/pah';
import * as PBP from './data/pbp';
import * as PGB from './data/pgb';
import * as PJS from './data/pjs';
import * as REL from './data/rel';
import * as RFS from './data/rfs';
import * as RHL from './data/rhl';
import * as RIM from './data/rim';
import * as RIR from './data/rir';
import * as ROA from './data/roa';
import * as ROG from './data/rog';
import * as ROL from './data/rol';
import * as ROT from './data/rot';
import * as SAH from './data/sah';
import * as SLC from './data/slc';
import * as SMD from './data/smd';
import * as SWK from './data/swk';
import * as TAC from './data/tac';
import * as TBA from './data/tba';
import * as THB from './data/thb';
import * as THJ from './data/thj';
import * as TIP from './data/tip';
import * as TMC from './data/tmc';
import * as TOL from './data/tol';
import * as USG from './data/usg';
import * as VMX from './data/vmx';
import * as WEB from './data/web';
import * as WFP from './data/wfp';
import * as WFS from './data/wfs';
import * as WHC from './data/whc';
import * as WHP from './data/whp';
import * as WTS from './data/wts';
import * as ZAT from './data/zat';

import * as MISC from './data/misc';

let rev_people = [AAB,ABA,ALH,BEA,BEN,BET,CHL,COR,DOL,GWA,ISP,JOD,JOJ,JOL,JSU,LAF,MAD,NAG,PAH,PJS,RHL,RIM,ROL,ROT,THB,THJ,TIP,WFP];
let antebellum_people = [ALG,ANJ,EZW,HEC,JAM,JAS,JCC,JHF,JOA,JOB,JQA,JQW,JRL,NIB,PBP,RFS,RIR,SAH,SWK,TAC,TBA,TMC,TOL,VMX,WEB,WFS,WHC,ZAT];
let cw_people = [DSL,DUF,EKS,FEA,FRD,GBM,HBS,HWH,JEB,JED,JJT,JML,JOS,JPJ,LUL,MBC,MTL,PGB,REL,ROA,ROG,SMD,USG,WTS];
let post_cw_people = [ESB,MNC,SLC];
let misc_people = [MISC];

const db = new Dexie('Archive');
console.log("db Biblio:",Biblio.sources);

// Define a schema. and add subsequent version changes.
db.version(1).stores({
	media: 'id, media.date, media.city, media.source, author.lastName, recipient.lastName',
  source: '++id, locator, title'
});

//called once (if browser has no record of the db)
db.on("populate", function() {
  console.log("populating db store");
  //bulk adding media sources (bibliography)
  db.source.bulkAdd(Biblio.sources).then(function(lastKey) {
    console.log("Done adding Biblio.sources");
    console.log("...last source id was: " + lastKey);
  }).catch(Dexie.BulkError, function (e) {
      console.error ("Some Biblio.sources did not successfully add: ", e.failures.length );
  });

  /*-- bulk adding media --*/
	rev_people.forEach(person => {
		db.media.bulkAdd(person.docs).then(function(lastKey) {
	    console.log("Done adding revolutionary person docs, lastKey:"+ lastKey);
	  }).catch(Dexie.BulkError, function (e) {
	    console.error ("some revolutionary era docs did not add: ", e.failures.length );
	  });
	});

	antebellum_people.forEach(person => {
		db.media.bulkAdd(person.docs).then(function(lastKey) {
	    console.log("Done adding antebellum person docs, lastKey:"+ lastKey);
	  }).catch(Dexie.BulkError, function (e) {
	    console.error ("some antebellum era docs did not add: ", e.failures.length );
	  });
	});

	cw_people.forEach(person => {
		db.media.bulkAdd(person.docs).then(function(lastKey) {
			console.log("Done adding civil war person docs, lastKey:"+ lastKey);
		}).catch(Dexie.BulkError, function (e) {
			console.error ("some civil war era docs did not add: ", e.failures.length );
		});
	});

	post_cw_people.forEach(person => {
		db.media.bulkAdd(person.docs).then(function(lastKey) {
			console.log("Done adding post civil war person docs, lastKey:"+ lastKey);
		}).catch(Dexie.BulkError, function (e) {
			console.error ("some post civil war era docs did not add: ", e.failures.length );
		});
	});

	misc_people.forEach(person => {
		db.media.bulkAdd(person.docs).then(function(lastKey) {
			console.log("Done adding misc person docs, lastKey:"+ lastKey);
		}).catch(Dexie.BulkError, function (e) {
			console.error ("some misc docs did not add: ", e.failures.length );
		});
	});
});

console.log("db",db);
export default db;
