/*jslint browser:true, node:true, devel:true */
/*jslint indent:4 */
/*global Sprite3D */
"use strict";
(function () {
            // create the main container
    var stage = Sprite3D.stage(),
        size = (document.body.offsetWidth / 2),
        box = Sprite3D.box(document.body.offsetWidth, document.body.offsetHeight, document.body.offsetWidth, ".box1");
    box.move(0, 0, -size);
    box.rotation(0, 0, 0);
    box.update();
    stage.appendChild(box);

    function onKeyDown(e) {
        // NOTE : 
        // In this listener function, "this" holds the reference to the box object,
        // and "e.target" points to the cube's face that was clicked - *cool*
        // let's add some *relative* rotation, and it will result 
        // in a nice animation thanks to the CSS transition defined above
        var angle = null,
            zomInc = null,
            zomValue = null;
        if ([37, 38, 39, 40].indexOf(e.keyCode) !== -1) {
            if (e.keyCode === 37) {
                box.rotate(0, 90, 0).update();
            }

            if (e.keyCode === 39) {
                box.rotate(0, -90, 0).update();
            }

            if (e.keyCode === 38) {
                box.rotate(-90, 0, 0).update();
            }

            if (e.keyCode === 40) {
                box.rotate(90, 0, 0).update();
            }
            angle = box._string[box._positions[3]] % 360;
            zomValue = box._string[box._positions[2]];
            zomInc = (document.body.offsetWidth - document.body.offsetHeight) / 2;
            if ([90, 270, -90, -270].indexOf(angle) !== -1) {
                if (zomValue === -size) {
                    box.move(0, 0, zomInc).update();
                }
            } else {
                if (zomValue !== -size) {
                    box.move(0, 0, -zomInc).update();
                }
            }
        }
    }
            // compact version
            // var box = stage.appendChild( Sprite3D.box(200,".box1").rotation(-15,15,0).update() );
            // add some basic interaction (move on click)
    window.addEventListener("keydown", onKeyDown, false);
    window.setTimeout(function () {
        document.querySelector('.front').innerHTML = document.querySelector('.front-side').innerHTML;
        document.querySelector('.left').innerHTML = document.querySelector('.left-side').innerHTML;
        document.querySelector('.bottom').innerHTML = document.querySelector('.bottom-side').innerHTML;
        document.querySelector('.right').innerHTML = document.querySelector('.right-side').innerHTML;
        document.querySelector('.back').innerHTML = document.querySelector('.back-side').innerHTML;
    }, 10);

}());