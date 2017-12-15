const sources = [ {"locator":"http://www.litchfieldhistoricalsociety.org/index.php","title":"Litchfield Historical Society Home"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/","title":"Litchfield Historical Society - The Ledger"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/2533","title":"Litchfield Historical Society - Benjamin Tallmadge"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/748","title":"Litchfield Historical Society - John Paine Cushman"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/749","title":"Litchfield Historical Society - Maria Tallmadge Cushman"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/2119","title":"Litchfield Historical Society - Tapping Reeve"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/2943","title":"Litchfield Historical Society - Henry Floyd Tallmadge"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/7169","title":"Litchfield Historical Society - Mary Pierce"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/3210","title":"Litchfield Historical Society - Lyman Beecher"},
  {"locator":"http://archive.org/details/mrslongfellowsel013699mbp","title":"Mrs Longfellow Selected Letters And Journals Of Fanny Appleton Longfellow"},
  {"locator":"http://archive.org/details/lettersjamesrus06lowegoog","title":"Letters of James Russell Lowell"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/1707","title":"Litchfield Historical Society - Virgil Maxcy"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/students/496","title":"Litchfield Historical Society - John C. Calhoun"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/materials/598","title":"Lithograph of Virgil Maxcy at the Litchfield Historical Society"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/ledger/materials/284","title":"Engraving of Tapping Reeve at the Litchfield Historical Society"},
  {"locator":"http://www.familytales.org/results.php?person=gwa&recipient=benjamin%20tallmadge","title":"George Washington letters to Benjamin Tallmadge"},
  {"locator":"https://www.gutenberg.org/files/13471/13471-h/13471-h.htm","title":"Letters of Ulysses S. Grant to His Father and His Youngest Sister, 1857-78, by Ulysses S. Grant, Edited by Jesse Grant Cramer"},
  {"locator":"http://www.gutenberg.org/ebooks/14721","title":"Speeches and Letters of Abraham Lincoln, 1832-1865, by Abraham Lincoln, Edited by Merwin Roe"},
  {"locator":"http://www.sfmuseum.org","title":"Virtual Museum of the City of San Francisco"},
  {"locator":"https://www.gutenberg.org/files/2323/2323-h/2323-h.htm","title":"Recollections and Letters of General Lee by Captain Robert E. Lee, His Son"},
  {"locator":"https://library.duke.edu/rubenstein/scriptorium/greenhow/","title":"Rose O'Neal Greenhow Papers, Special Collections Library, Duke University"},
  {"locator":"http://anza.uoregon.edu","title":"An Interactive Study Environment on Spanish Exploration and Colonization of 'Alta California' 1774-1776"},
  {"locator":"https://www.loc.gov/rr/rarebook/digitalcoll.html#Books","title":"Library of Congress, Rare Book and Special Collections Division"},
  {"locator":"http://eds.a.ebscohost.com/eds/detail/detail?vid=4&sid=77f4b1dc-437e-45ab-9b91-36889ccba03a%40sessionmgr4010&bdata=JnNpdGU9ZWRzLWxpdmU%3d","title":"Benjamin S. Lippincott letters : ALS, 1847-1851. Berkeley Library, University of California"},
  {"locator":"https://www.loc.gov/item/05030358/","title":"Library of Congress, Rare Book and Special Collections Division, Letters from the Pacific slope; or First impressions."},
  {"locator":"https://www.loc.gov/item/53001743/","title":"Library of Congress, Rare Book and Special Collections Division, Alonzo Delano's California correspondence"},
  {"locator":"https://www.loc.gov/item/30030332/","title":"Library of Congress, Rare Book and Special Collections Division, One man's gold; the letters & journal of a forty-niner, Enos Christman"},
  {"locator":"https://archive.org/details/lettersmrsadams01adamrich","title":"Letters of Mrs. Adams, the Wife of John Adams. Volume I. 1840, Boston, Charles C. Little and James Brown"},
  {"locator":"https://books.google.com/books/about/Letters_of_Mrs_Adams.html?id=SswKAQAAIAAJ","title":"Letters of Mrs. Adams, The Wife of John Adams With an Introductory Memoir by Her Grandson, Charles Francis Adams, Volume II, 1840"},
  {"locator":"https://archive.org/details/byhisgransonwife01adamrich","title":"Letters of John Adams, Addressed to His Wife. Edited by His Grandson, Charles Francis Adams, Volume I, 1841"},
  {"locator":"https://archive.org/details/byhisgransonwife02adamrich","title":"Letters of John Adams, Addressed to His Wife. Edited by His Grandson, Charles Francis Adams, Volume II, 1841"},
  {"locator":"http://www.gutenberg.org/ebooks/7850","title":"Memoirs of Aaron Burr, Volume 1., by Matthew L. Davis, 1836"},
  {"locator":"https://archive.org/details/writingsofjohnqu05adam","title":"Writings of John Quincy Adams, Worthington Chauncy Ford, Vol. I, 1779-1796"},
  {"locator":"https://archive.org/details/historiclettersf00phil","title":"Historic letters from the collection of the West Chester State Normal School, 1898, Philips, George Morris"},
  {"locator":"http://gwpapers.virginia.edu/","title":"The Papers of George Washington - University of Virginia"},
  {"locator":"https://archive.org/details/writingsofgeorge02washuoft","title":"The Writings of George Washington Vol II, Jared Sparks, 1847"},
  {"locator":"https://books.google.com/books/about/The_life_of_John_Jay.html?id=dkssAAAAIAAJ","title":"The Life John Jay With Selections from His Correspondence and Miscellaneous Papers. by His Son, William Jay in Two Volumes. Vol. II., 1833."},
  {"locator":"https://archive.org/details/writingsofgeorge08washuoft","title":"The Writings of George Washington Being His Correspondence, Addresses, Messages, and Other Papers, Official and Private, Selected and Published from the Original Manuscripts. Vol VIII, Jared Sparks, 1839"},
  {"locator":"https://archive.org/details/lifeofgouverneur02spar","title":"The Life of Gouverneur Morris With Selections from His Correspondence and Miscellaneous Papers Vol. II., Jared Sparks, 1832"},
  {"locator":"http://www.gutenberg.org/ebooks/16781","title":"Memoir, Correspondence, And Miscellanies, From The Papers Of Thomas Jefferson, by Thomas Jefferson"},
  {"locator":"https://books.google.com/books/about/Letters_of_Mrs_Adams.html?id=1EUEAAAAYAAJ","title":"Letters of Mrs. Adams, The Wife of John Adams With an Introductory Memoir by Her Grandson, Charles Francis Adams, Volume I, 1840"},
  {"locator":"https://archive.org/details/writingsalbertg01gallgoog","title":"The writings of Albert Gallatin, Vol I, Henry Adams"},
  {"locator":"https://search.amphilsoc.org/collections/view?docId=ead/Mss.B.F85.misc-ead.xml","title":"Miscellaneous Benjamin Franklin Collections, American Philosophical Society"},
  {"locator":"https://archive.org/details/lifeofjohnjaywit01jayw","title":"The life of John Jay: with selections from his correspondence and miscellaneous papers"},
  {"locator":"https://archive.org/details/writingsofbenjam05franuoft","title":"The Writings of Benjamin Franklin Volume V, Albert Henry Smyth, 1906"},
  {"locator":"https://archive.org/details/letterszachtaylor00taylrich","title":"Letters of Zachary Taylor, from the battle-fields of the Mexican War"},
  {"locator":"https://archive.org/details/privatecorrespon00lcclay","title":"The private correspondence of Henry Clay"},
  {"locator":"https://archive.org/details/tomexicowithscot01smit","title":"To Mexico with Scott; letters of Captain E. Kirby Smith to his wife"},
  {"locator":"https://archive.org/details/memoirsoflieutge00inscot","title":"Autobiography of Lieut.-Gen. Winfield Scott in Two Volumes - Book by Winfield Scott, 1864"},
  {"locator":"https://archive.org/details/milloperations01romarich","title":"The military operations of General Beauregard in the war between the States 1861 to 1865, including a brief personal sketch and a narrative of his services in the war with Mexico, 1846"},
  {"locator":"https://archive.org/details/generalmcclellan01mich","title":"Great Commanders General McClellan, General Peter S. Michie, 1901"},
  {"locator":"http://www.worldcat.org/title/winfield-scott-the-soldier-and-the-man/oclc/807145","title":"Winfield Scott: The Soldier and the Man. Book by Charles Winslow Elliott; 1937"},
  {"locator":"http://www.oac.cdlib.org/search?style=oac4;ff=0;institution=UC%20Berkeley::Bancroft%20Library;query=Antonio%20L%C3%B3pez%20de%20Santa%20Anna%20correspondence%20:%20Veracruz,%20Mexico,%20to%20Secretary%20of%20State%20and%20relations,%201828-1829.;idT=UCb111837649","title":"Antonio López de Santa Anna correspondence : Veracruz, Mexico, to Secretary of State and relations, 1828-1829."},
  {"locator":"http://texashistory.unt.edu/data/LDZ/meta-pth-6024.tkl","title":"University of North Texas Libraries, The Center for American History Collection, Santa Anna, Antonio Lopez de, 1829"},
  {"locator":"https://archive.org/details/shermletterscorr00sheriala","title":"The Sherman letters : correspondence between General and Senator Sherman from 1837 to 1891"},
  {"locator":"https://archive.org/stream/lettersotherwrit01madi#page/n7/mode/2up","title":"LETTERS AND OTHER WRITINGS OF JAMES MADISON. VOL. I. 1769-1793. PHILADELPHIA: J. B. LIPPINCOTT & CO"},
  {"locator":"https://archive.org/details/memoirsandlette00madigoog","title":"Memoirs and letters of Dolly Madison, wife of James Madison, President of the United States. 1886, Cutts, Lucia Beverly"},
  {"locator":"https://www.gutenberg.org/files/8376/8376-h/8376-h.htm","title":"Memoirs, Correspondence and Manuscripts of General Lafayette, Published by his family, 1837"},
  {"locator":"https://archive.org/details/correspondenceof03spar","title":"Correspondence of the American Revolution, Being Letters of Eminent Men to George Washington, from the Time of His Taking Command of the Army to the End of His Presidency, Volume III., Jared Sparks, 1853"},
  {"locator":"https://archive.org/details/correspondenceof04spar","title":"Correspondence of the American Revolution, Being Letters of Eminent Men to George Washington, from the Time of His Taking Command of the Army to the End of His Presidency, Volume IV., Jared Sparks, 1853"},
  {"locator":"https://archive.org/details/genesiscivilwar01crawgoog","title":"The genesis of the Civil War: the story of Sumter, 1860-1861 by Crawford, Samuel Wylie"},
  {"locator":"https://archive.org/details/correspondenceof00bidd","title":"The correspondence of Nicholas Biddle Dealing With National Affairs 1807 thru 1844"},
  {"locator":"https://archive.org/details/privatecorrespon01webs","title":"Private Correspondence of Daniel Webster, Edited by Fletcher Webster, Volume I, 1857"},
  {"locator":"https://archive.org/details/lifeandlettersof00sanbrich","title":"Life and Letters of John Brown, Liberator of Kansas, and Martyr of Virginia"},
  {"locator":"https://archive.org/details/memoirsaaronbur00davigoog","title":"Memoirs of Aaron Burr, Volume 1."},
  {"locator":"https://archive.org/details/memoirsofaaronbu02burr","title":"Memoirs of Aaron Burr, Volume 2."},
  {"locator":"https://archive.org/details/blennerhassettpa00saff","title":"The Blennerhassett papers, embodying the private journal of Harman Blennerhassett, and the hitherto unpublished correspondence of Burr, Alston, Comfort Tyler, Devereaux, Dayton, Adair, Miro, Emmett, Theodosia Burr Alston, Mrs. Blennerhassett, and others"},
  {"locator":"https://books.google.com/books?id=uixDbGUoSWMC","title":"Annual Report of the American Historical Association for the Year 1899, Calhoun Correspondence."},
  {"locator":"https://archive.org/details/writingsofalbert02gall","title":"The writings of Albert Gallatin, Vol II, Henry Adams"},
  {"locator":"https://archive.org/details/womanswartimejou00burgiala","title":"A woman's wartime journal; an account of the passage over a Georgia plantation of Sherman's army on the march to the sea, as recorded in the diary of Dolly Sumner Lunt"},
  {"locator":"https://archive.org/details/diaryfromdixie00chesrich","title":"A Diary from Dixie As Written by Mary Boykin Chesnut, Edited by Isabella D. Martin and Myrta Lockett Avary, 1906"},
  {"locator":"https://archive.org/details/confederategirlsdaws","title":"A Confederate Girls Diary, Dawson, Sarah Morgan"},
  {"locator":"https://archive.org/details/eminentmentogw02jarerich","title":"Correspondence of the American Revolution; Being Letters of Eminent Men to George Washington, from the Time of His Taking Command of the Army to the End of His Presidency, Volume II., Jared Sparks, 1853"},
  {"locator":"https://archive.org/details/armylaurensyear00johnrich","title":"The Army correspondence of Colonel John Laurens in the years 1777-8"},
  {"locator":"https://archive.org/details/documentaryhisto02gibb","title":"Documentary history of the American revolution: consisting of letters and papers relating to the contest for liberty, chiefly in South Carolina, from originals in the possession of the editor, and other sources"},
  {"locator":"https://archive.org/details/lifetimothypick03uphagoog","title":"The Life Timothy Pickering. by His Son, Octavius Pickering. Volume I. 1867"},
  {"locator":"https://archive.org/details/lifeofharrietbee00instow","title":"Life of Harriet Beecher Stowe, compiled from her letters and journals by her son, Charles Edward Stowe (1889)"},
  {"locator":"https://archive.org/details/lifeandlettersof020966mbp","title":"Life and letters of John Greenleaf Whittier Vol. 1, Samuel T. Pickard, 1894"},
  {"locator":"https://archive.org/details/lucylar00addi","title":"Lucy Larcom, life, letters, and diary (1895), Boston, Houghton, Mifflin and Co."},
  {"locator":"https://archive.org/details/lettersjamesrus08lowegoog","title":"Letters of James Russell Lowell, Vol. I, Harper & Brothers, 1894"},
  {"locator":"http://www.litchfieldhistoricalsociety.org/archon/?p=collections/findingaid&id=1&rootcontentid=1","title":"Benjamin Tallmadge collection, 1933-19-0, Litchfield Historical Society, Helga J. Ingraham Memorial Library, P.O. Box 385, 7 South Street, Litchfield, Connecticut, 06759"},
  {"locator":"https://archive.org/details/lettersofulysses00granrich","title":"Letters of Ulysses S. Grant to his father and his youngest sister, 1857-78"},
  {"locator":"https://archive.org/details/correspondencec04corngoog","title":"Correspondence of Charles, first Marquis Cornwallis, Vol I, Charles Ross, Esq., London, 1859"},
  {"locator":"https://archive.org/details/lifeofalexanderh01hami3","title":"The Life of Alexander Hamilton by His Son, JOHN C. HAMILTON, Vol. I., 1834"},
  {"locator":"https://archive.org/details/correspondenceb00jackgoog","title":"Correspondence between Gen. Andrew Jackson and John C. Calhoun, President and Vice-president of the U. States, on the subject of the course of the latter, in the deliberations of the cabinet of Mr. Monroe, on the occurences in the Seminole War"},
  {"locator":"https://archive.org/stream/generallewiscass01cass/generallewiscass01cass_djvu.txt","title":"General Lewis Cass, 1782-1866"},
  {"locator":"https://archive.org/details/lifeselectlitera00cranrich","title":"Life and Select Literary Remains of Sam Houston, of Texas. Two Vols. in One. William Carey Crane, D.D.,Ll.D., 1884."},
  {"locator":"https://archive.org/details/eminentmentogw01jarerich","title":"Correspondence of the American Revolution; Being Letters of Eminent Men to George Washington, from the Time of His Taking Command of the Army to the End of His Presidency, Volume I., Jared Sparks, 1853"},
  {"locator":"https://library.duke.edu/rubenstein/scriptorium/bryant/","title":"Emma Spaulding Bryant Letters, An On-line Archival Collection, Special Collections Library, Duke University"},
  {"locator":"https://archive.org/details/mrslongfellowsel013699mbp","title":"Mrs Longfellow Selected Letters And Journals Of Fanny Appleton Longfellow, 1817 1861"},
  {"locator":"https://archive.org/details/behindscenesor2006keck","title":"Behind the scenes, or, Thirty years a slave, and four years in the White House, by Keckley, Elizabeth, ca. 1818-1907"},
  {"locator":"https://archive.org/details/lifetimesoffrede00indoug","title":"The life and times of Frederick Douglass, written by himself from 1817-1882"},
  {"locator":"https://antislavery.eserver.org/contemporary/gilder_lehrman_center_online_bibliography","title":"Online Documents Retrieved November 10th, 2012 from www.yale.edu/glc/archive/authors.htm"},
  {"locator":"https://archive.org/details/manassasappomatt00longrich","title":"From Manassas to Appomattox Memoirs of the Civil War in America, James Longstreet, 1896"},
  {"locator":"https://archive.org/details/generalmcclellan01hurl","title":"General McClellan and the Conduct of the War, William Henry Hurlbert, 1913"},
  {"locator":"https://archive.org/details/jeffersondavisex01davi","title":"Jefferson Davis: ex-President of the Confederate States of America, 1890, Davis, Varina"},
  {"locator":"http://jeffersondavis.rice.edu/site.cfm#docs","title":"The Papers of Jefferson Davis, http://jeffersondavis.rice.edu/site.cfm#docs, accessed on Aug 28th, 2009"},
  {"locator":"https://archive.org/details/lifeofjohncharle00newy","title":"Life of John Charles Fremont, 1856, Greeley & McElrath, New York"},
  {"locator":"https://archive.org/details/lifeexplorations01upha","title":"Life, explorations and public services of John Charles Fremont by Upham, Charles Wentworth, 1856"},
  {"locator":"https://archive.org/details/memoirsofmylife00fr","title":"Memoirs of My Life, by John Charles Fremont. 1887, Chicago, New York, Belford, Clarke & Company"},
  {"locator":"https://archive.org/details/sketchlifecomrobert00bayarich","title":"A sketch of the life of Com. Robert F. Stockton, 1856, Derby & Jackson, New York"},
  {"locator":"#","title":"Unknown Source"},
  {"locator":"http://www.vmi.edu/archives/stonewall-jackson-resources/stonewall-jackson-papers/","title":"Virginia Military Institute, Stonewaall Jackson Papers"},
  {"locator":"https://archive.org/details/documentaryhisto01gibbuoft","title":"Documentary History of the American Revolution Consisting of Letters and Papers Relating to the Contest for Liberty, Chiefly in South Carolina, from Originals in the Possession of the Editor, and Other Sources, 1776"},
  {"locator":"https://archive.org/details/pathenrylife01henrrich","title":"Patrick Henry; life, correspondence and speeches, Volume 1, William Wirt Henry, 1891"},
  {"locator":"https://archive.org/details/memoiroflifeofri01leer","title":"Memoir of the life of Richard Henry Lee, and his correspondence with the most distinguished men in America and Europe, illustrative of their characters, and of the events of the American revolution"},
  {"locator":"https://archive.org/details/biographicalnote00huntiala","title":"Biographical Notes Concerning General Richard Montgomery Together With Hitherto Unpublished Letters. 1876."},
  {"locator":"https://archive.org/details/withinfortsumter00shee","title":"Within Fort Sumter; or, A View of Major Anderson's Garrison Family for One Hundred and Ten Days, 1861"},
  {"locator":"http://scriptorium.lib.duke.edu/greenhow/","title":"Rose O'Neal Greenhow Papers, An On-line Archival Collection, Special Collections Library, Duke University"},
  {"locator":"http://www.militarymuseum.org/Sheman2.html","title":"The California Military Museum"},
  {"locator":"https://archive.org/details/diplomaticcorres01sparuoft","title":"The Diplomatic Correspondence of the American Revolution. Vol. I., Jared Sparks, 1829"}
];

export {
  sources
};
