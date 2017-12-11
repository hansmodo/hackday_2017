//note: not possible to pass live regex objects via window messaging.
//so these strings will be vivified into a live regex by content script.
const RE_PEOPLE	= ['Samuel Clemens','Samuel Langhorne Clemens','Orion Clemens','Ulysses S. Grant','Ulysses Grant','Abe Lincoln','Abraham Lincoln','Honest Abe','President Lincoln','A.E. Burnside','Ambrose Burnside','Henry Halleck','H.W. Halleck','george mcclellan','george b. mcclellan','Stonewall Jackson','Thomas Jackson','Thomas Jonathan Jackson','Robert E. Lee','Robert Lee','General Lee','Jefferson Davis','President Davis','Mary Custis Lee','Mrs Robert E. Lee','Mary Anna Custis Lee','Mary Custis','Mary Lee','William Fitzhugh Lee','Fitzhugh Lee','William Henry Fitzhugh Lee','Mildred Lee','Agnes Lee','Andrew Johnson','President Johnson','President Andrew Johnson','James Ewell Brown Stuart','James Stuart','J.E.B. Stuart','General Stuart','Emma Bryant','Emma Spaulding Bryant','Rose Greenhow','Rose Oneil Greenhow','Juan Bautista de Anza','John Augustus Sutter','John Sutter','Captain Sutter','Tamzene Eustis Donner','Tamzene Donner','Thomas Larkin','Thomas O. Larkin','Benjamin S. Lippincott','Benjamin Lippincott','William Sherman','William Tecumseh Sherman','General William Tecumseh Sherman','General Sherman','John Wool','John Ellis Wool','General Wool','Franklin Buck','James Polk','James Knox Polk','President Polk','Zachary Taylor','President Taylor','General Taylor','Old Rough and Ready','Winfield Scott','General Scott','Old Fuss and Feathers','Grand Old Man of the Army','George Washington','General Washington','President Washington','President Jefferson','Thomas Jefferson','Benjamin Franklin','Ben Franklin','Abiah Franklin','Abiah Folger Franklin','Kirby Smith','E. Kirby Smith','Captain Smith','Ephraim Smith','Antonio Lopez de Santa Anna','General Santa Anna','President Santa Anna','Antonio Santa Anna','Andrew Jackson','President Jackson','General Jackson','Old Hickory','William Marcy','John Sherman','Senator Sherman','John C. Calhoun','J. C. Calhoun','Vice President Calhoun','William Crawford','William H. Crawford','George McDuffie','Benjamin Williams Crowninshield','B. W. Crowninshield','John Forsyth','James Monroe','President Monroe','John Quincy Adams','William Wirt','James Madison','President Madison','Dolly Madison','Mrs Madison','Dolley Madison','Dolley Todd','General Lafayette','Marie-Joseph-Paul-Yves-Roch-Gilbert du Motier Lafayette','Marquis de La Fayette','Eliza Lee','Phoebe Morris','Sally McKean','Sally D Yrujo','Madame D Yrujo','Rebecca Hubbs','Anna Cutts','Anna Payne','W. Gallatin','W Gallatin','Dorothea Payne','Elizabeth Collins Lee','Phoebe Pemberton Morris','Rebecca Crispin Hubbs','Elizabeth Keckley','Elizabeth Hobbs Keckley','Mary Todd Lincoln','Mary Todd','Mary Lincoln','Mrs Lincoln','Frederick Douglass','Abigail Adams','Abigail Smith','John Adams','President Adams','Sarah Winston','Sarah Winston Henry','Sarah Henry','Patrick Henry','Patrick Henry Jr.','Richard Henry Lee','Richard Lee','Sam Adams','Samuel Adams','Governor Adams','The Last Puritan','Francis Lightfoot Lee','Francis Lee','Nathanael Greene','General Greene','Major General Greene','Philip John Schuyler','Philip Schuyler','General Schuyler','Israel Putnam','General Putnam','John Sullivan','Brigadier General Sullivan','Major General Mifflin','Thomas Mifflin','Governor Thomas Mifflin','Timothy Pickering','Brigadier General Pickering','Horatio Gates','General Gates','Antony Wayne','General Wayne','Benedict Arnold','General Arnold','Edmund Randolph','Governor Randolph','Secretary of State Randolph','Attorney General Randolph','Henry Clay','Henry Clay Sr.','Lucretia Hart','Lucretia Hart Clay','Aaron Burr','President Burr','Colonel Burr','President Harrison','William Henry Harrison','General Harrison','Old Tippecanoe','John Tyler','President Tyler','Richard Rush','Secretary Rush','Daniel Webster','Secretary Webster','Peter Buell Porter','P. B. Porter','General Porter','General P. B. Porter','John Jordan Crittenden','John Crittenden','William Creighton','Josiah S Johnston','Josiah Johnston','J. S. Johnston','Abraham Alfonse Albert Gallatin','Albert Gallatin','John Marshall','Chief Justice Marshall','Thomas Sidney Jesup','General Jesup','James Barbour','Secretary Barbour','Governor Barbour','Nicholas Biddle','Harrison Gray Otis','Senator Otis','Martin Van Buren','President Van Buren','Secretary Van Buren','Governor Van Buren','Lord Morpeth','7th Earl of Carlisle','Viscount Morpeth','Theodore Frelinghuysen','Senator Frelinghuysen','Millard Fillmore','President Fillmore','Ambrose Spencer','Judge Adam Beatty','William Campbell Preston','Senator Preston','Charles Francis Adams','Charles Adams','Henry Clay','Henry Clay Jr.','Thomas Clay','Porter Clay','Elizabeth Watkins','Anne B. Clay','Anne Clay','John Brown','George Stearns','George L. Stearns','Theodosia Bartow','Theodosia Prevost','Theodosia Prevost Burr','Theodosia Burr Alston','Theodosia Alston','Alexander McDougall','General McDougall','Colonel Richard Platt','Judge William Paterson','Governor William Paterson','Robert Troup','Peter Colt','Joseph Alston','Richard Montgomery','Jonathan Trumbull','David Wooster','John Hancock','George Mason','Henry Knox','Robert Morris','George Clinton','William Heath','John Cadwalader','Benjamin Lincoln','Henry Laurens','John Laurens','John Jay','Alexander Hamilton','William Livingston','Christopher Greene','Kazimierz Pulaski','John Burgoyne','Thomas Wharton','Joseph Reed','Daniel Brodhead','Jean Baptiste Charles Henri Hector','Charles Henri Hector','Arthur St. Clair','General St. Clair','General Devereux','Robert Livingston','John Stark','General Stark','Jean Baptiste Donatien de Vimeur','Count de Rochambeau','Chevalier de la Luzerne','Friedrich Steuben','Friedrich Wilhelm von Steuben','Baron von Steuben','Thomas Chittenden','John Rutledge','Governor Rutledge','James Clinton','General Clinton','James Duane','Chevalier de Ternay','Admiral Ternay','Christopher Gadsden','General Gadsden','Andrew Pickens','General Pickens','Francis Marion','General Marion','Thomas Pinckney','Charles Cotesworth Pinckney','General Pinckney','Peter Horry','Colonel Horry','Robert Howe','General Howe','Gilbert du Motier Lafayette','Jean Baptiste de Vimeur','Alexander Leslie','General Leslie','Charles Cotesworth Pinckney','Charles Pinckney','Edward Rutledge','Governor Rutledge','Gouverneur Morris','Edmund Pendleton','James Lovell','William Grenville','Lord Grenville','Rufus King','William Bingham','William Wilberforce','Richard Peters','Noah Webster','George Otis','Silas Deane','Thomas Paine','David Humphreys','Thomas Marshall','Benjamin Harris','Catherine Macaulay','William Grayson','James Bowdoin','Benjamin Hawkins','Henry Lee','Francis Osborne','Francois Deforgues','Robert Dinwiddie','Governor Dinwiddie','Martha Washington','Janet Livingston','Janet Montgomery','Edward Livingston','General Riedesel','Friedrich Riedesel','Friedrich Adolph Riedesel','Archibald Yell','Governor Yell','Archibald H. Yell','Col. Archibald Yell','Benjamin Rush','Dr. Rush','Dr. Benjamin Rush','Robert Lenox','Samuel Smith','Thomas Cooper','Thomas Cadwalader','William Lewis','Charles Baker','Charles Davis','Charles Ingersoll','John Sergeant','Sam Houston','John Sloane','Secretary Sloane','James Brown','Senator Brown','Langdon Cheves','General Green','Francis Pickens','Hilliard Judge','James Gadsden','James Hamilton','Joseph Smith','John Barbour','M Norton','M P Norton','Robert Hunter','Robert Mercer Taliaferro Hunter','Virgil Maxcy','Andrew Donelson','Andrew Jackson Donelson','A J Donelson','Wilson Lumpkin','James Buchanan','John Calhoun','Duff Green','Lewis Cass','Eliza Buckminster Lee','Eliza Lee','Ezekiel Webster','Joseph Story','Sally Webster','Grace Fletcher Webster','Joseph Hopkinson','George Meade','General Meade','Winfield Scott Hancock','General Hancock','Theodore Lyman','Charles Cornwallis','Banastre Tarleton','Henry Clinton','Francis Rawdon-Hastings','William Howe','George Germain','Lord Germain','Lord George Sackville','Thomas Jesup','Pierre Gustave Toutant Beauregard','P.G.T. Beauregard','General Beauregard','Leroy Walker','Leroy Pope Walker','LP Walker','Gustavus Fox','Simon Cameron','General Johnston','Joseph Johnston','Robert Anderson','Major Anderson','Joseph Holt','John Schofield','General Schofield','Philip Sheridan','John Pope','General Pope','James Longstreet','General Longstreet','William Seward','Walt Whitman','George Pickett','General Pickett','Varina Davis','Varina Banks Howell Davis','Dolly Sumner Lunt','Dolly Lunt','Mary Boykin Chestnut','John Bell Hood','General Hood','Sarah Dawson','Sarah Morgan','Sarah Morgan Dawson','Edwin M. Stanton','Edwin Stanton','Secretary Stanton','Joseph Hooker','General Hooker','Fighting Joe','John Fremont','General Fremont','John Montgomery','John B. Montgomery','Captain Montgomery','Archibald Gillespie','Archie Gillespie','Robert F. Stockton','Robert Stockton','R. F. Stockton','Commodore Stockton','John Sloat','John D. Sloat','Commodore Sloat','Stephen Kearny','Stephen W. Kearny','General Kearny','H. S. Turner','Captain Turner','H Turner','Jose Castro','General Castro','William Ide','William B. Ide','George Bancroft','Secretary Bancroft','Harriet Beecher Stowe','Oliver Wendell Holmes','Mary Anne Evans','George Eliot','Mary Anne Lewes','Elizabeth Browning','Elizabeth Barrett Browning','Anne Noel Byron','Anne Noel Milbanke','Anne Isabella Noel Byron','Anne Isabella Milbanke','Charles Sumner','Calvin Stowe','Calvin Ellis Stowe','Georgiana May','William Lloyd Garrison','John Greenleaf Whittier','Caleb Cushing','John Whittier','Elizabeth Whittier','Lizzie Whittier','Gerrit Smith','Lucy Larcom','Jessie Benton','Jessie Benton Fremont','Ralph Waldo Emerson','Harriet Minot','Harriet Minot Pitman','Annie Adams Fields','George Loring','George B. Loring','James Lowell','James R. Lowell','Charles Briggs','C.F. Briggs','Charles Frederick Briggs','Henry Longfellow','Henry Wadsworth Longfellow','Sydney Gay','Sydney Howard Gay','Sydney H. Gay','James Fields','James Thomas Fields','John Motley','John Lothrop Motley','Charles Norton','Charles Eliot Norton','Frances Longfellow','Franny Longfellow','Frances Elizabeth Appleton','Frances Elizabeth Appleton Longfellow','Benjamin Tallmadge','John Cushman','John Paine Cushman','Maria Tallmadge','Maria Cushman','Mary Floyd Tallmadge','Maria Tallmadge Cushman','Tapping Reeve','Lyman Beecher','Mary Pierce','Frederick Tallmadge','Phebe Tallmadge','Henry Tallmadge','Charles Ingersoll','Barent Gardenier','Christopher Gore','Francis Baring','W Van Ness','William Scott','Sir William Scott','Stephen Van Rensselaer','William King','Charles King','Elbridge Gerry'].join('|');

//listen to msgs
chrome.runtime.onMessage.addListener(
  function(request, sender, sendResponse) {
    //console.log('request:',request);
    if(request.content === 'load'){
      sendResponse({'regex':RE_PEOPLE});
    }

    if(request.content === 'parsed'){
      console.log('content has been parsed');
      let people = request.people.filter((person, index, self) => self.findIndex(t => t.name === person.name ) === index)
      let peopleCntStr = people.length.toString();
      console.log("people:",people);
      chrome.browserAction.setBadgeBackgroundColor({ color: [255, 0, 0, 255] });
      chrome.browserAction.setBadgeText({ text: peopleCntStr })
    }
});
