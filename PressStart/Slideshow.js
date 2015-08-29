var slideimages = new Array() // Images will be preloaded in this array 
slideimages[0] = new Image()
slideimages[0].src = "gameImages/BattlefieldX3.jpg"
slideimages[1] = new Image()
slideimages[1].src = "gameImages/AdvancedWarfareX3.jpg"
slideimages[2] = new Image()
slideimages[2].src = "gameImages/GTA3604.jpg"
slideimages[3] = new Image()
slideimages[3].src = "gameImages/Forza3.jpg" 
slideimages[4] = new Image()
slideimages[4].src = "gameImages/Mario3D14.jpg" // set image object src property to an image's src, preloading that image in the process


var links = new Array(); //Should provide a different link for each image, so that eventually you can go to pages by clicking on the images *may still not                                                                                                                                       work 100% as expected
links[0] = 'itempagefj.php?id=25'; 
links[1] = 'itempagefj.php?id=19'; 
links[2] = 'itempagefj.php?id=38';
links[3] = 'itempagefj.php?id=29';
links[4] = 'itempagefj.php?id=40';

var step=0

function slideit(){

 //if browser does not support the image object, exit.
 if (!document.images)
  return
 document.getElementById('slide').src = slideimages[step].src
 if (step<4)//change to match array size
  step++
 else
  step=0
 //call function "slideit()" every 4 seconds
 setTimeout("slideit()",5000)
document.getElementById("changeable").href = links[step];
}