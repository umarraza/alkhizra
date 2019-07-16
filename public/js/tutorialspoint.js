$(document).ready(function(event) {
    var room_id, user_name;
    ion.sound({
        sounds: [{
            name: "bell_ring"
        }],
        path: "/theme/js/sounds/",
        preload: true,
        multiplay: true,
        volume: 0.9
    });
    $('#dlg').dialog('close');
    $('#invite').dialog('close');
    $('#ancStartChat').bind('click', function() {
        $('#dlg').dialog('open');
    });
    $('#eids').textbox({
        onClickButton: function() {
            if ($('#eids').validatebox('isValid')) {
                var url = "board-invite.php";
                var inputs = {
                    'mid': room_id,
                    'user': user_name,
                    'emails': $('#eids').val()
                };
                $.ajax({
                    type: "POST",
                    url: url,
                    data: inputs,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#invite').dialog('close');
                        $("#wait").html("Sending invitation...");
                        $(".wrapLoader").css({
                            "visibility": "visible"
                        });
                    },
                    success: function(data) {
                        $(".wrapLoader").css({
                            "visibility": "hidden"
                        });
                        $.messager.alert('Message', data.message);
                    },
                    error: function(data) {
                        $(".wrapLoader").css({
                            "visibility": "hidden"
                        });
                        $.messager.alert('Message', data.message);
                    }
                });
            }
        }
    });
    window.onbeforeunload = function() {
        return "Leaving this page may cause loss of your work!";
    };
    $('.subProperties').hide();
    //$('#penEdit').show();
    var eraserFlag = false;
    var eraserColor = '';
    var eraserArray = new Array;
    var totCount = 0;
    var totArray = new Array;
    var gcanvas = new fabric.Canvas('canvasBoard', {
        isDrawingMode: true,
        backgroundColor: '#ffffff'
    });
    fabric.Object.prototype.transparentCorners = false;
    gcanvas.setHeight($('#center').height());
    gcanvas.setWidth($('#center').width());
    gcanvas.freeDrawingBrush.color = '#000000';
    gcanvas.freeDrawingBrush.width = 2;

    $("#cc").layout('panel', 'east').panel({
        onExpand: function() {
            gcanvas.setWidth($('#center').width() - 220);
            gcanvas.renderAll();
        },
        onCollapse: function() {
            gcanvas.setWidth($('#center').width());
            gcanvas.renderAll();
        }
    });

    /* Background Color */

    $('#ancBackground').click(function() {
        $('.subProperties').hide();
        $("#cc").layout('panel', 'east').panel({
            //title:'Background',
            //iconCls:'icon-bgcolor'
        });
        gcanvas.isDrawingMode = false;
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        /*
              if($("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
      $('#bgColorpick').show();
        
     // $('#bgColorpick').animate({
     //           width: "toggle"
     //     });/

    });
    $('.clsBgColor').click(function() {
        var bgclr = $(this).children().css('background-color');
        bgclr = rgb2hex(bgclr);
        if (eraserFlag) {
            gcanvas.forEachObject(function(obj) {
                if (typeof obj.stroke == 'object') {
                    obj.stroke = '#ffffff';
                } else {
                    if (obj.stroke != eraserColor) {
                        if (obj.stroke == '#ffffff' || obj.stroke == '#fff') {
                            obj.stroke = bgclr;
                            eraserColor = bgclr;
                        } else {
                            eraserColor = bgclr;
                        }
                    } else {
                        obj.stroke = bgclr;
                    }
                }
            });
        }
        gcanvas.setBackgroundImage('');
        gcanvas.setBackgroundColor('');
        $('#txtBgColorVal').val(bgclr);
        gcanvas.setBackgroundColor(bgclr);
        gcanvas.renderAll();
    });

    function clearSlide() {
        if (gcanvas.getObjects().length > 0) {
            gcanvas.clear();
            gcanvas.freeDrawingBrush.width = 2;
            gcanvas.freeDrawingBrush.color = '#000000';
            eraserFlag = false;
            gcanvas.renderAll();
            $('#lineSlide').numberspinner({
                value: 2
            });
            $('#eraserSlide').numberspinner({
                value: 2
            });
            $('#txtPencilClrVal').val('#000000');
            $('#txtPencilClrHexa').val('#000000');
            $('#txtShapeOutline').val(2);
            $('#txtShapeOutlineHexavalue').val('#000000');
            $('#txtShapeOutlineClrVal').val('#000000');
            $('#txtFillClrVal').val('#000000');
            $('#txtFillClrHexa').val('#000000');
            txtNum = 1;
            shapenum = 1;
        }
    }

    function displaySlide(src) {
        if (!(src.length > 0)) {
            return false;
        }
        var imgObj = new Image();
        imgObj.crossOrigin = "Anonymous";
        imgObj.onload = function() {
            var image = new fabric.Image(imgObj);
            gcanvas.setBackgroundColor('#ffffff');
            gcanvas.setBackgroundImage(image, gcanvas.renderAll.bind(gcanvas), {
                scaleY: gcanvas.height / image.height,
                scaleX: gcanvas.width / image.width,
                backgroundImageStretch: true
            });
        }
        imgObj.src = src;
        $('img[seq]').attr("style", "border:1px solid #ccc");
        $('img[seq="' + slideSeq + '"]').attr("style", "border:2px solid #407450");
    }
    var slideSeq = 0,
        maxSeq = 0,
        slideSrc = "",
        baseURL = "";
    $(document).on("click", '#south .clsBgColor img', function(event) {
        slideSrc = $(this).attr("alt");
        slideSeq = parseInt($(this).attr("seq"));
        maxSeq = parseInt($(this).attr("max"));
        baseURL = $(this).attr("base");
        clearSlide();
        displaySlide(slideSrc);
    });
    $(document).keydown(function(e) {
        /* Previous slide */
        if (e.keyCode == 37 || e.keyCode == 40) {
            if (slideSeq > 0) {
                slideSeq = slideSeq - 1;
                slideSrc = baseURL + "/" + "slide-" + slideSeq + ".jpg";
                clearSlide();
                displaySlide(slideSrc);
            }
            return false;
        }
    });
    $(document).keydown(function(e) {
        /* Next slide */
        if (e.keyCode == 38 || e.keyCode == 39) {
            if (slideSeq < maxSeq - 1) {
                slideSeq = slideSeq + 1;
                slideSrc = baseURL + "/" + "slide-" + slideSeq + ".jpg";
                clearSlide();
                displaySlide(slideSrc);
            }
            return false;
        }
    });
    $('#txtBgColorVal').change(function() {
        var bgclr = $(this).val();
        if (eraserFlag) {
            gcanvas.forEachObject(function(obj) {
                if (typeof obj.stroke == 'object') {
                    obj.stroke = '#ffffff';
                } else {
                    if (obj.stroke != eraserColor) {
                        eraserColor = bgclr;
                    } else {
                        obj.stroke = bgclr;
                    }
                }
            });
        }
        gcanvas.setBackgroundImage('');
        gcanvas.setBackgroundColor('');
        gcanvas.setBackgroundColor(bgclr);
        gcanvas.renderAll();
    });

    $('.bgclpkr').click(function() {
        var src = $(this).children().attr('src');
        gcanvas.setBackgroundImage('');
        gcanvas.setBackgroundColor('');
        gcanvas.setBackgroundColor({
            source: src,
            repeat: 'repeat'
        }, function() {
            gcanvas.renderAll();
        });
        slideSrc = "";
        /*  if(eraserFlag)
         {  
            gcanvas.forEachObject(function(obj){
               if(typeof obj.stroke == 'object'){   
                   obj.stroke = '#ffffff';  
               } else {
                  if(eraserArray.indexOf(obj.stroke) != -1){             
                     obj.stroke = '#ffffff';
                  } 
               } 
            });           
         }    */
    });
    $('#btnUploadPattern').click(function() {
        $('#filePattern').trigger('click');
    });
    $('#filePattern').change(function(e) {
        var file = $('#filePattern').val();
        var exts = ['jpg', 'jpeg', 'png'];
        if (file.length <= 0) {
            alert("Please select a file from local drive.");
            $('#filePattern').focus();
            return false;
        }
        var ext = file.split('.');
        ext = ext.reverse();
        if ($.inArray(ext[0].toLowerCase(), exts) < 0) {
            alert("Please select jpg/jpeg/png format files only.");
            $('#filePattern').focus();
            return false;
        }
        var reader = new FileReader();
        reader.onload = function(event) {
            var imgObj = new Image;
            imgObj.src = event.target.result;
            imgObj.onload = function() {
                var image = new fabric.Image(imgObj);
                gcanvas.setBackgroundColor('#ffffff');
                gcanvas.setBackgroundImage(image, gcanvas.renderAll.bind(gcanvas), {
                    scaleY: gcanvas.height / image.height,
                    scaleX: gcanvas.width / image.width
                });
                slideSrc = "";
            }
        }
        reader.readAsDataURL(e.target.files[0]);
    });

    /* Pencil */

    $('#ancPencil').click(function() {
        readdFlag = 0;
        $("#cc").layout('panel', 'east').panel({
            //title:'Pencil',
            //iconCls:'icon-pencil'
        });
        eraserFlag = false;
        gcanvas.isDrawingMode = true;
        gcanvas.freeDrawingBrush.color = $('#txtPencilClrVal').val();
        gcanvas.freeDrawingBrush.width = $('#lineSlide').val();
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#penEdit').show();
    });
    $('.clsPencilColor').click(function() {
        var pclr = $(this).children().css('background-color');
        pclr = rgb2hex(pclr);
        $('#txtPencilClrVal').val(pclr);
        $('#txtPencilClrHexa').val(pclr);
        gcanvas.freeDrawingBrush.color = pclr;
        gcanvas.renderAll();
    });

    function rgb2hex(rgb) {
        rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
        return (rgb && rgb.length === 4) ? "#" +
            ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
            ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
            ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
    }
    $('#lineSlide').numberspinner({
        min: 1,
        max: 50,
        increment: 1,
        editable: true,
        value: 2,
        onChange: function(nv) {
            gcanvas.freeDrawingBrush.color = $('#txtPencilClrVal').val();
            gcanvas.freeDrawingBrush.width = parseInt(nv);
            gcanvas.renderAll();
        }
    });
    $('#txtPencilClrVal').change(function() {
        $('#txtPencilClrHexa').val($(this).val());
        gcanvas.freeDrawingBrush.color = $(this).val();
        gcanvas.renderAll();
    });
    $('#txtPencilClrHexa').keyup(function() {
        $('#txtPencilClrVal').val($(this).val());
        gcanvas.freeDrawingBrush.color = $(this).val();
        gcanvas.renderAll();
    });

    /* Eraser */
    $('#ancEraser').click(function() {
        eraserFlag = true;
        if (typeof gcanvas.backgroundColor == 'object') {
            eraserColor = '#ffffff';
        } else {
            eraserColor = gcanvas.backgroundColor;
        }
        $("#cc").layout('panel', 'east').panel({
            // title:'Eraser',
            //iconCls:'icon-eraser'
        });
        eraserArray.push(eraserColor);
        gcanvas.freeDrawingBrush.color = eraserColor;
        gcanvas.freeDrawingBrush.width = $('#eraserSlide').val();
        gcanvas.isDrawingMode = true;
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#eraseOptions').show();
    });

    $('#eraserSlide').numberspinner({
        min: 1,
        max: 50,
        increment: 1,
        editable: true,
        value: 2,
        onChange: function(nv) {
            eraserFlag = true;
            eraserColor = gcanvas.backgroundColor;
            gcanvas.freeDrawingBrush.color = eraserColor;
            gcanvas.freeDrawingBrush.width = parseInt(nv);
            gcanvas.renderAll();
        }
    });

    /* Shapes */

    var shapeArry = new Array();
    var shapenum = 1;
    $('#ancShape').click(function() {
        $("#cc").layout('panel', 'east').panel({
            //title:'Shapes',
            //iconCls:'icon-shapes'
        });
        eraserFlag = false;
        gcanvas.isDrawingMode = false;
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#shapeOptions').show();
        if (shapenum > 1) {
            for (var i = 1; i <= shapenum - 1; i++) {
                shapeArry[i].set({
                    hasControls: true,
                    hasBorders: true,
                    selectable: true
                });
            }
        }
    });
    $('.shapeFillColor').click(function() {
        var fclr = $(this).children().css('background-color');
        fclr = rgb2hex(fclr);
        $('#txtFillClrVal').val(fclr);
        $('#txtFillClrHexa').val(fclr);
        var cobj = gcanvas.getActiveObject();
        cobj.setFill(fclr);
        gcanvas.renderAll();
    });
    $('#shapeRect').click(function() {
        addRect(shapenum);
        shapenum++;
    });
    $('#shapeSquare').click(function() {
        addSquare(shapenum);
        shapenum++;
    });
    $('#shapeCircle').click(function() {
        addCircle(shapenum);
        shapenum++;
    });
    $('#shapeTriangle').click(function() {
        addTriangle(shapenum);
        shapenum++;
    });
    $('#shapeLine').click(function() {
        addLine(shapenum);
        shapenum++;
    });
    $('#shapeEllipse').click(function() {
        addEllipse(shapenum);
        shapenum++;
    });

    function addRect(shapenum) {
        shapeArry[shapenum] = new fabric.Rect({
            width: 200,
            height: 100,
            left: 50,
            top: 50,
            fill: '',
            stroke: '#000000',
            strokeWidth: 2
        });
        shapeArry[shapenum].on('selected', function(e) {
            $('#txtFillClrVal').val(this.getFill());
            $('#txtFillClrHexa').val(this.getFill());
            $('#txtShapeOutline').val(this.getStrokeWidth());
            $('#txtShapeOutlineClrVal').val(this.getStroke());
            $('#txtShapeOutlineHexavalue').val(this.getStroke());
            gcanvas.bringForward(this);
        });
        gcanvas.add(shapeArry[shapenum]);
        gcanvas.centerObject(shapeArry[shapenum]);
        shapeArry[shapenum].setCoords();
        gcanvas.setActiveObject(shapeArry[shapenum]);
        gcanvas.renderAll();
    };

    function addSquare(shapenum) {
        shapeArry[shapenum] = new fabric.Rect({
            width: 100,
            height: 100,
            left: 150,
            top: 50,
            fill: '',
            stroke: '#000000',
            strokeWidth: 2
        });
        shapeArry[shapenum].on('selected', function(e) {
            $('#txtFillClrVal').val(this.getFill());
            $('#txtFillClrHexa').val(this.getFill());
            $('#txtShapeOutline').val(this.getStrokeWidth());
            $('#txtShapeOutlineClrVal').val(this.getStroke());
            $('#txtShapeOutlineHexavalue').val(this.getStroke());
            gcanvas.bringForward(this);
        });
        gcanvas.add(shapeArry[shapenum]);
        gcanvas.centerObject(shapeArry[shapenum]);
        shapeArry[shapenum].setCoords();
        gcanvas.setActiveObject(shapeArry[shapenum]);
        gcanvas.renderAll();
    };

    function addCircle(shapenum) {
        shapeArry[shapenum] = new fabric.Circle({
            radius: 50,
            fill: '',
            stroke: '#000000',
            strokeWidth: 2
        });
        shapeArry[shapenum].on('selected', function(e) {
            $('#txtFillClrVal').val(this.getFill());
            $('#txtFillClrHexa').val(this.getFill());
            $('#txtShapeOutline').val(this.getStrokeWidth());
            $('#txtShapeOutlineClrVal').val(this.getStroke());
            $('#txtShapeOutlineHexavalue').val(this.getStroke());
            gcanvas.bringForward(this);
        });
        gcanvas.add(shapeArry[shapenum]);
        gcanvas.centerObject(shapeArry[shapenum]);
        shapeArry[shapenum].setCoords();
        gcanvas.setActiveObject(shapeArry[shapenum]);
        gcanvas.renderAll();
    };

    function addTriangle(shapenum) {
        shapeArry[shapenum] = new fabric.Triangle({
            width: 100,
            height: 100,
            fill: '',
            stroke: '#000000',
            strokeWidth: 2
        });
        shapeArry[shapenum].on('selected', function(e) {
            $('#txtFillClrVal').val(this.getFill());
            $('#txtFillClrHexa').val(this.getFill());
            $('#txtShapeOutline').val(this.getStrokeWidth());
            $('#txtShapeOutlineClrVal').val(this.getStroke());
            $('#txtShapeOutlineHexavalue').val(this.getStroke());
            gcanvas.bringForward(this);
        });
        gcanvas.add(shapeArry[shapenum]);
        gcanvas.centerObject(shapeArry[shapenum]);
        shapeArry[shapenum].setCoords();
        gcanvas.setActiveObject(shapeArry[shapenum]);
        gcanvas.renderAll();
    };

    function addLine(shapenum) {
        shapeArry[shapenum] = new fabric.Line([0, 0, 200, 0], {
            fill: '#000000',
            stroke: '#000000',
            strokeWidth: 2
        });
        shapeArry[shapenum].on('selected', function(e) {
            $('#txtFillClrVal').val(this.getFill());
            $('#txtFillClrHexa').val(this.getFill());
            $('#txtShapeOutline').val(this.getStrokeWidth());
            $('#txtShapeOutlineClrVal').val(this.getStroke());
            $('#txtShapeOutlineHexavalue').val(this.getStroke());
            gcanvas.bringForward(this);
        });
        gcanvas.add(shapeArry[shapenum]);
        gcanvas.centerObject(shapeArry[shapenum]);
        shapeArry[shapenum].setCoords();
        gcanvas.setActiveObject(shapeArry[shapenum]);
        gcanvas.renderAll();
    };

    function addEllipse(shapenum) {
        shapeArry[shapenum] = new fabric.Ellipse({
            fill: '',
            stroke: '#000000',
            strokeWidth: 2,
            rx: 100,
            ry: 50
        });
        shapeArry[shapenum].on('selected', function(e) {
            $('#txtFillClrVal').val(this.getFill());
            $('#txtFillClrHexa').val(this.getFill());
            $('#txtShapeOutline').val(this.getStrokeWidth());
            $('#txtShapeOutlineClrVal').val(this.getStroke());
            $('#txtShapeOutlineHexavalue').val(this.getStroke());
            gcanvas.bringForward(this);
        });
        gcanvas.add(shapeArry[shapenum]);
        gcanvas.centerObject(shapeArry[shapenum]);
        shapeArry[shapenum].setCoords();
        gcanvas.setActiveObject(shapeArry[shapenum]);
        gcanvas.renderAll();
    };

    $('#txtFillClrHexa').keyup(function() {
        $('#txtFillClrVal').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setFill($(this).val());
        gcanvas.renderAll();
    });
    $('#txtFillClrVal').change(function() {
        $('#txtFillClrHexa').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setFill($(this).val());
        gcanvas.renderAll();
    });
    $('#txtShapeOutline').keyup(function() {
        var cobj = gcanvas.getActiveObject();
        cobj.set({
            strokeWidth: parseInt($(this).val())
        });
        gcanvas.renderAll();
    });
    $('#txtShapeOutlineHexavalue').keyup(function() {
        $('#txtShapeOutlineClrVal').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setStroke($(this).val());
        gcanvas.renderAll();
    });
    $('#txtShapeOutlineClrVal').change(function() {
        $('#txtShapeOutlineHexavalue').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setStroke($(this).val());
        gcanvas.renderAll();
    });

    $('.clrDynamicCanvas').click(function() {
        if (gcanvas.getObjects().length > 0) {
            var confirmFlag = confirm("Do you really want to clear the board?");
            if (confirmFlag == true) {
                gcanvas.clear();
                gcanvas.freeDrawingBrush.width = 2;
                gcanvas.freeDrawingBrush.color = '#000000';
                eraserFlag = false;
                gcanvas.renderAll();
                $('#lineSlide').numberspinner({
                    value: 2
                });
                $('#eraserSlide').numberspinner({
                    value: 2
                });
                $('#txtPencilClrVal').val('#000000');
                $('#txtPencilClrHexa').val('#000000');
                $('#txtShapeOutline').val(2);
                $('#txtShapeOutlineHexavalue').val('#000000');
                $('#txtShapeOutlineClrVal').val('#000000');
                $('#txtFillClrVal').val('#000000');
                $('#txtFillClrHexa').val('#000000');
                txtNum = 1;
                shapenum = 1;
            }
        }
    });

    $('#btnRemoveShape').click(function() {
        var cobj = gcanvas.getActiveObject();
        gcanvas.remove(cobj);
        gcanvas.renderAll();
        $('#txtShapeOutline').val(2);
        $('#txtShapeOutlineHexavalue').val('#000000');
        $('#txtShapeOutlineClrVal').val('#000000');
        $('#txtFillClrVal').val('#000000');
        $('#txtFillClrHexa').val('#000000');
    });

    /* Text */

    var txtNum = 1;
    var iTextArr = new Array();
    var textArr = new Array();
    var fontArr = new Array();
    var alignArr = new Array();
    var styleArr = new Array();
    var sizeArr = new Array();
    var colorArr = new Array();

    $('#ancText').click(function() {
        $("#cc").layout('panel', 'east').panel({
            //  title:'Text',
            // iconCls:'icon-text'
        });
        eraserFlag = false;
        gcanvas.isDrawingMode = false;
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#textOptions').show();
        if (txtNum > 1) {
            for (var i = 1; i <= txtNum - 1; i++) {
                iTextArr[i].set({
                    hasControls: true,
                    hasBorders: true,
                    selectable: true
                });
            }
        }
        addText(txtNum);
        txtNum++;
    });

    function addText(num) {
        textArr[num] = 'Sample Text';
        fontArr[num] = 'Times New Roman';
        alignArr[num] = 'left';
        sizeArr[num] = '20';
        styleArr[num] = 'normal';
        colorArr[num] = '#ff0000';
        $('.divStyleBold i, .divStyleItalic i').css({
            'background-color': "#ffffff",
            'color': '#000000'
        });
        $('.divAlign i').css({
            'background-color': "#ffffff",
            'color': '#000000'
        });
        $('#alignleft i').css({
            'background-color': "#424242",
            'color': '#ffffff'
        });
        iTextArr[num] = new fabric.IText(textArr[num], {
            fill: colorArr[num],
            hasControls: true,
            hasBorders: true,
            hasRotatingPoint: true
        });
        iTextArr[num].set({
            fontFamily: fontArr[num],
            textAlign: alignArr[num],
            fontStyle: styleArr[num],
            fontSize: sizeArr[num],
            padding: 5
        });
        iTextArr[num].on('selected', function(e) {
            $('#txtStyle').val(this.getFontFamily());
            $('#txtText').val(this.getText());
            $('#txtTextSize').val(this.getFontSize());
            $('#txtClrVal').val(this.getFill());
            $('#txtHexavalue').val(this.getFill());
            $('#txtOutline').val(this.getStrokeWidth());
            $('#txtOutlineClrVal').val(this.getStroke());
            $('#txtOutlineHexavalue').val(this.getStroke());
            $('#txtBGClrVal').val(this.getTextBackgroundColor());
            $('#txtBGHexavalue').val(this.getTextBackgroundColor());
            var alignopt = this.getTextAlign();
            var styleopt = this.getFontStyle();
            var weightopt = this.getFontWeight();
            $('.divAlign i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
            $('#align' + alignopt + ' i').css({
                'background-color': "#424242",
                'color': '#ffffff'
            });
            $('.divStyleBold i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
            $('#style' + weightopt + ' i').css({
                'background-color': "#424242",
                'color': '#ffffff'
            });
            $('.divStyleItalic i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
            $('#style' + styleopt + ' i').css({
                'background-color': "#424242",
                'color': '#ffffff'
            });
        });
        gcanvas.on('text:changed', function(e) {
            var cobj = gcanvas.getActiveObject();
            $('#txtText').val(cobj.getText());
        });
        gcanvas.add(iTextArr[num]);
        gcanvas.setActiveObject(iTextArr[num]);
        gcanvas.centerObject(iTextArr[num]);
        iTextArr[num].setCoords();
        gcanvas.renderAll();
    }
    $('#btnNewText').click(function() {
        addText(txtNum);
        txtNum++;
    });
    $('#btnRemoveText').click(function() {
        var cobj = gcanvas.getActiveObject();
        gcanvas.remove(cobj);
        $('.divStyleBold i, .divStyleItalic i').css({
            'background-color': "#ffffff",
            'color': '#000000'
        });
        $('.divAlign i').css({
            'background-color': "#ffffff",
            'color': '#000000'
        });
        $('#alignleft i').css({
            'background-color': "#424242",
            'color': '#ffffff'
        });
        $('#txtStyle').val('Times New Roman');
        $('#txtText').val('Sample Text');
        $('#txtTextSize').val(20);
        $('#txtClrVal').val('#ff0000');
        $('#txtHexavalue').val('#ff0000');
        $('#txtOutline').val(1);
        $('#txtOutlineClrVal').val('#000000');
        $('#txtOutlineHexavalue').val('#000000');
        $('#txtBGClrVal').val('#000000');
        $('#txtBGHexavalue').val('#000000');
    });
    $('#txtStyle').change(function() {
        var cobj = gcanvas.getActiveObject();
        cobj.set({
            fontFamily: $(this).val()
        });
        gcanvas.renderAll();
    });
    var flagAlign = 1;
    $('.divAlign').click(function() {
        $('.divAlign i').css({
            'background-color': "#ffffff",
            'color': '#000000'
        });
        $(this).find('i').css({
            'background-color': "#424242",
            'color': '#ffffff'
        });
        var cobj = gcanvas.getActiveObject();
        var v = $(this).attr('data-opt');
        cobj.set({
            textAlign: v
        });
        gcanvas.renderAll();
    });
    var flagBold = 0;
    var flagItalic = 0;
    $('.divStyleBold').click(function() {
        var cobj = gcanvas.getActiveObject();
        if (flagBold) {
            flagBold = 0;
            if (flagItalic == 1) {
                cobj.set({
                    fontStyle: 'italic',
                    fontWeight: ''
                });
            } else {
                cobj.set({
                    fontStyle: 'normal',
                    fontWeight: ''
                });
            }
            $('.divStyleBold i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
        } else {
            flagBold = 1;
            if (flagItalic == 1) {
                cobj.set({
                    fontStyle: 'italic',
                    fontWeight: 'bold'
                });
            } else {
                cobj.set({
                    fontStyle: 'normal',
                    fontWeight: 'bold'
                });
            }
            $('.divStyleBold i').css({
                'background-color': "#424242",
                'color': '#ffffff'
            });
        }
        gcanvas.renderAll();
    });
    $('.divStyleItalic').click(function() {
        var cobj = gcanvas.getActiveObject();
        if (flagItalic == 1) {
            flagItalic = 0;
            if (flagBold == 1) {
                cobj.set({
                    fontStyle: '',
                    fontWeight: 'bold'
                });
            } else {
                cobj.set({
                    fontStyle: '',
                    fontWeight: 'normal'
                });
            }
            $('.divStyleItalic i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
        } else {
            flagItalic = 1;
            if (flagBold == 1) {
                cobj.set({
                    fontStyle: 'italic',
                    fontWeight: 'bold'
                });
            } else {
                cobj.set({
                    fontStyle: 'italic',
                    fontWeight: 'normal'
                });
            }
            $('.divStyleItalic i').css({
                'background-color': "#424242",
                'color': '#ffffff'
            });
        }
        gcanvas.renderAll();
    });
    $('#txtText').keyup(function() {
        var cobj = gcanvas.getActiveObject();
        cobj.setText($(this).val());
        gcanvas.renderAll();
    });
    $('#txtTextSize').keyup(function() {
        var cobj = gcanvas.getActiveObject();
        cobj.setFontSize($(this).val());
        gcanvas.renderAll();
    });
    $('#txtHexavalue').keyup(function() {
        $('#txtClrVal').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setFill($(this).val());
        gcanvas.renderAll();
    });
    $('#txtClrVal').change(function() {
        $('#txtHexavalue').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setFill($(this).val());
        gcanvas.renderAll();
    });
    $('#txtBGHexavalue').keyup(function() {
        $('#txtBGClrVal').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setTextBackgroundColor($(this).val());
        gcanvas.renderAll();
    });
    $('#txtBGClrVal').change(function() {
        $('#txtBGHexavalue').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        cobj.setTextBackgroundColor($(this).val());
        gcanvas.renderAll();
    });

    $('#txtOutlineHexavalue').keyup(function() {
        $('#txtOutlineClrVal').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        var sval = $('#txtOutline').val();
        cobj.set({
            stroke: $(this).val(),
            strokeWidth: sval
        });
        gcanvas.renderAll();
    });
    $('#txtOutlineClrVal').change(function() {
        $('#txtOutlineHexavalue').val($(this).val());
        var cobj = gcanvas.getActiveObject();
        var sval = $('#txtOutline').val();
        cobj.set({
            stroke: $(this).val(),
            strokeWidth: sval
        });
        gcanvas.renderAll();
    });
    $('#txtOutline').keyup(function() {
        var cobj = gcanvas.getActiveObject();
        var sval = $('#txtOutlineHexavalue').val();
        cobj.set({
            strokeWidth: $(this).val(),
            stroke: sval
        });
        gcanvas.renderAll();
    });

    /* Download */

    $('#ancDownload').click(function() {
        $("#cc").layout('panel', 'east').panel({
            // title:'Download / Upload',
            // iconCls:'icon-upload'
        });
        eraserFlag = false;
        gcanvas.isDrawingMode = false;
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#downloadOptions').show();
    });
    var dimgCount = 1;
    $('#ancDwnJson').click(function() {
        var canvasData = gcanvas.toJSON();
        canvasData = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(canvasData));
        var a = $("<a>").attr("href", canvasData).attr("download", 'tp-whiteboard-' + dimgCount + '.board').appendTo("body");
        a[0].click();
        a.remove();
        dimgCount++;
    });
    $('#ancDwnJpeg').click(function() {
        var canvasData = gcanvas.toDataURL();
        var a = $("<a>").attr("href", canvasData).attr("download", 'tp-whiteboard-' + dimgCount + '.jpg').appendTo("body");
        a[0].click();
        a.remove();
        dimgCount++;
    });


    /* Upload JSON */

    $('#ancUpload').click(function() {
        eraserFlag = false;
        gcanvas.isDrawingMode = false;
        gcanvas.forEachObject(function(obj) {
            obj.set({
                hasControls: false,
                hasBorders: false,
                selectable: false
            });
        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#uploadOptions').show();
    });
    $('#btnUpload').click(function() {
        $('#fileJson').trigger('click');
    });
    $('#fileJson').change(function(e) {
        var file = $('#fileJson').val();
        var exts = ['board'];
        if (file.length <= 0) {
            alert("Please select a file from local drive.");
            $('#fileJson').focus();
            return false;
        }
        var ext = file.split('.');
        ext = ext.reverse();
        if ($.inArray(ext[0].toLowerCase(), exts) < 0) {
            alert("Please select board format files only.");
            $('#fileJson').focus();
            return false;
        }
        var inputs = new FormData();
        inputs.append('jsonfile', $("#fileJson").prop("files")[0]);
        var url = "upload_board.php";
        $('.wrapLoader').show();
        $.ajax({
            url: url,
            method: "POST",
            cache: false,
            data: inputs,
            processData: false,
            contentType: false
        }).done(function(msg) {
            gcanvas.loadFromJSON(msg, gcanvas.renderAll.bind(gcanvas));
            gcanvas.forEachObject(function(obj) {
                if (obj.type == 'path') {
                    obj.set({
                        hasControls: false,
                        hasBorders: false,
                        selectable: false
                    });
                }
            });
            $('.wrapLoader').hide();
        });
    });

    /* Image */

    $('#ancImage').click(function() {
        $('#fileImage').trigger('click');
        $("#cc").layout('panel', 'east').panel({
            // title:'Image',
            // iconCls:'icon-image'
        });
        eraserFlag = false;
        gcanvas.isDrawingMode = false;
        gcanvas.forEachObject(function(obj) {
            if (typeof obj == 'object' && !obj.hasOwnProperty('minScaleLimit') && !obj.hasOwnProperty('text') && !obj.hasOwnProperty('stroke')) {
                obj.set({
                    hasControls: true,
                    hasBorders: true,
                    selectable: true
                });
            } else {
                obj.set({
                    hasControls: false,
                    hasBorders: false,
                    selectable: false
                });
            }

        });
        gcanvas.renderAll();
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $('#imageOptions').show();
    });
    $('#btnNewImage').click(function() {
        $('#fileImage').trigger('click');
    });
    $('#fileImage').change(function(e) {
        var file = $('#fileImage').val();
        var exts = ['jpg', 'jpeg', 'png'];
        if (file.length <= 0) {
            alert("Please select a file from local drive.");
            $('#fileImage').focus();
            return false;
        }
        var ext = file.split('.');
        ext = ext.reverse();
        if ($.inArray(ext[0].toLowerCase(), exts) < 0) {
            alert("Please select jpg/jpeg/png format files only.");
            $('#fileImage').focus();
            return false;
        }
        var reader = new FileReader();
        reader.onload = function(event) {
            var imgObj = new Image;
            imgObj.src = event.target.result;
            imgObj.onload = function() {
                var image = new fabric.Image(imgObj);
                gcanvas.add(image);
                gcanvas.centerObject(image);
                gcanvas.setActiveObject(image);
                image.setCoords();
                gcanvas.renderAll();
            }
        }
        reader.readAsDataURL(e.target.files[0]);
    });
    $('#btnRemoveImage').click(function() {
        var cobj = gcanvas.getActiveObject();
        gcanvas.remove(cobj);
        gcanvas.renderAll();
    });

    /* Undo/Redo */

    var reflag = false;
    var cstep = 0;
    var i = 0;
    gcanvas.on('object:added', function(opt) {
        totArray[i] = opt.target;
        i++;
    });

    function doUndo() {
        if (i > 0) {
            reflag = true;
            gcanvas.remove(totArray[i - 1]);
            i--;
        }
    }
    $('#ancUndo').click(function() {
        doUndo();
    });

    function doRedo() {
        if (i < totArray.length) {
            gcanvas.add(totArray[i]);
            if (!reflag) {
                i++;
            }
        }
    }
    $('#ancRedo').click(function() {
        doRedo();
    });
    $(document).keydown(function(e) {
        //e.preventDefault();
        if (e.which == 90 && (e.metaKey && e.shiftKey)) {
            e.preventDefault();
            doRedo();
        } else if (e.which == 89 && e.ctrlKey) {
            e.preventDefault();
            doRedo();
        } else if (e.which == 90 && e.ctrlKey) {
            e.preventDefault();
            doUndo();
        } else if (e.which == 90 && e.metaKey) {
            e.preventDefault();
            doUndo();
        } else if (e.which == 187 && (e.metaKey || e.ctrlKey)) {
            e.preventDefault();
            if (eraserFlag) {
                var penSize = parseInt($('#eraserSlide').numberspinner('getValue'));
                penSize++;
                $('#eraserSlide').numberspinner('setValue', penSize);
            } else {
                var penSize = parseInt($('#lineSlide').numberspinner('getValue'));
                penSize++;
                $('#lineSlide').numberspinner('setValue', penSize);
            }
        } else if (e.which == 189 && (e.metaKey || e.ctrlKey)) {
            e.preventDefault();
            if (eraserFlag) {
                var penSize = parseInt($('#eraserSlide').numberspinner('getValue'));
                penSize--;
                $('#eraserSlide').numberspinner('setValue', penSize);
            } else {
                var penSize = parseInt($('#lineSlide').numberspinner('getValue'));
                penSize--;
                $('#lineSlide').numberspinner('setValue', penSize);
            }
        }
    });
    /* Help */
    var panels = $('.easyui-accordion').accordion('panels');
    $.each(panels, function() {
        this.panel('collapse');
    });
    $('#ancHelpMain').click(function() {
        $('.subProperties').hide();
        /*
              if( $("#cc").layout('panel','east').panel('options').collapsed ){
                 $('#cc').layout('expand','east');
              }
        */
        $("#cc").layout('panel', 'east').panel({
            //title:'Help',
            //iconCls:'icon-help'
        });
        $('#helpOptions').show();
    });
    $('#helpWindow').window('close');
    
    $(document).click(function(){
        var $el = $("#helpOptions");
         if ($el.is(":visible")) {
            $el.hide();
            $('#helpWindow').window('close');
         }
    });
    $('.ancHelp').click(function(event) {
        event.stopPropagation();
        $('#helpWindow').window('close');
        var imgsrc = 'http://www.tutorialspoint.com/whiteboard/images/help/' + $(this).attr('alt') + '.jpg';
        $('#helpWindow img').attr('src', imgsrc);
        $('#helpWindow').window('open');
    });
    $('html').keyup(function(e) {
        if (e.keyCode == 46 || e.keyCode == 8) {
            var cobj = gcanvas.getActiveObject();
            if(cobj.hasOwnProperty("text")){
               return;
            }
            gcanvas.remove(cobj);
            $('.divStyleBold i, .divStyleItalic i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
            $('.divAlign i').css({
                'background-color': "#ffffff",
                'color': '#000000'
            });
            $('#alignleft i').css({
                'background-color': "#424242",
                'color': '#ffffff'
            });
            $('#txtStyle').val('Times New Roman');
            $('#txtText').val('Sample Text');
            $('#txtTextSize').val(20);
            $('#txtClrVal').val('#ff0000');
            $('#txtHexavalue').val('#ff0000');
            $('#txtOutline').val(1);
            $('#txtOutlineClrVal').val('#000000');
            $('#txtOutlineHexavalue').val('#000000');
            $('#txtBGClrVal').val('#000000');
            $('#txtBGHexavalue').val('#000000');
            $('#txtShapeOutline').val(2);
            $('#txtShapeOutlineHexavalue').val('#000000');
            $('#txtShapeOutlineClrVal').val('#000000');
            $('#txtFillClrVal').val('#000000');
            $('#txtFillClrHexa').val('#000000');
            gcanvas.renderAll();
            e.preventDefault();
            return false;
        }
    });
    $('#maximize').click(function() {
        if (screenfull.enabled) {
            screenfull.toggle($('#stage')[0]);
        }
    });
    /*
       $(document).on(screenfull.raw.fullscreenchange, function () {
         if(screenfull.isFullscreen){
               gcanvas.setHeight( window.innerHeight );
               gcanvas.setWidth( window.innerWidth );
         }else{
             gcanvas.setHeight($('#center').height());
             gcanvas.setWidth($('#center').width());
         }
         gcanvas.calcOffset();
         gcanvas.forEachObject(function(o) {
           o.setCoords();
         });
         gcanvas.renderAll();
       });
    */
    $("#cc").layout('panel', 'center').panel({
        onResize: function(w, h) {
            if (screenfull.isFullscreen) {
                gcanvas.setHeight(window.innerHeight);
                gcanvas.setWidth(window.innerWidth);
            } else {
                gcanvas.setHeight(h);
                gcanvas.setWidth(w);
            }
            displaySlide(slideSrc);
            gcanvas.calcOffset();
            gcanvas.forEachObject(function(o) {
                o.setCoords();
            });
            gcanvas.renderAll();
        }
    });
    $('#ancPattern').click(function() {
        $('.subProperties').hide();
        $("#cc").layout('panel', 'east').panel({
            //             title:'Pattern',
            //             iconCls:'icon-bgcolor'
        });
        $('#bgPattern').show();
    }); 
    $('#ancHelpMain').click(function(event) {
        event.stopPropagation();
        $('#helpOptions').show();
    });
    
    $('#btnDisplayMenu').hide();
    $('#btnShowMenu').click(function(event) {
        event.stopPropagation();
        $('#btnDisplayMenu').toggle();
    });    
    $(document).click(function() {
       // $('#btnDisplayMenu').hide();
       // $('#helpOptions').hide();
       // $('#helpWindow').window('close');  
         var $el = $("#btnDisplayMenu");
         if ($el.is(":visible")) {
            $el.toggle();
         }
    });
     $('#btnDisplayMenu').click(function(event) {
        event.stopPropagation();
        //$('#btnDisplayMenu').show();
    });     
   
   
    $("#cc").layout('collapse', 'south');
    $("#cc").layout('collapse', 'east');
    ////////////////////////////////////////////
    function validateEmail(value) {
        var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return (regex.test(value)) ? true : false;
    }

    function validateEmails(string) {
        var result = string.replace(/\s/g, "").split(/,|;/);

        for (var i = 0; i < result.length; i++) {
            if (!validateEmail(result[i])) {
                return false;
            }
        }
        return true;
    }
    $('#btnSendInvite').bind('click', function() {
        $('#invite').dialog('open');
    });
    $.extend($.fn.validatebox.defaults.rules, {
        emails: {
            validator: function(value) {
                return validateEmails(value);
            },
            message: 'Enter correct Email IDs'
        }
    });
    //global RTCMultiConnection object
    var connection = new RTCMultiConnection();
    //whether we init slickjs for the 1st time(need for correct unslick() function)
    var isFirstSlickInit = true;
    //container for user faces in the top part of the chat
    var containerUserFaces = $("#containerUserFaces");
    //container for bigger user video and the fullscreen button
    var containerBigVideoAndFullscreen = $("#containerBigVideoAndFullscreen");
    //container for bigger video
    var containerBigVideo = $("#containerBigVideo");
    var currentBigVideo = {
        src: "",
        streamid: "",
        enabled: false
    };
    var remoteUserId;

    function setupWebRTC() {
        // custom signaling server
        connection.socketURL = 'https://tools.tutorialspoint.com:9001/';
        connection.socketMessageEvent = 'webrtcTPsocketMsgEvent';

        connection.enableFileSharing = true;
        connection.filesContainer = chatContainer;
        connection.session = {
            audio: true,
            video: true,
            data: true
        };
        connection.sdpConstraints.mandatory = {
            OfferToReceiveAudio: true,
            OfferToReceiveVideo: true
        };
        // Adding display name to the conenction
        connection.extra.user_name = $("#user_name").val();
        // Local audio and video are disabled by default
        connection.extra.enabledVideo = false;
        connection.extra.isAudioMuted = true;
        console.log(connection);
    }

    //when clicking on the video in the top menu move it to the middle and make bigger
    containerUserFaces.on('click', 'video', function() {
        //save old video stream
        currentBigVideo.src = $(this).attr('src');
        currentBigVideo.streamid = $(this).attr('id');
        currentBigVideo.enabled = true;
//        updateContainerUserFaces();
        adjustBigVideo();
    });

    $("#create_meeting_room").bind("click", function(e) {
        room_id = $("#room_id").val();
        if (room_id.length < 4) {
            $("#room_id").textbox({
                value: "",
                prompt: "Enter a unique room ID (At least 4 characters)"
            });
            $("#room_id").focus();
            return;
        }
        user_name = $("#user_name").val();
        if (user_name.length < 4) {
            $("#user_name").textbox({
                value: "",
                prompt: "Enter your name (At least 4 characters)"
            });
            $("#user_name").focus();
            return;
        }
        $('#dlg').dialog('close');
        $('.wrapLoader').show();
        /* First check if room exist or not */
        $("#wait").html("Going to create a meeting room with given ID...");
        setupWebRTC();
        connection.checkPresence(room_id, function(isRoomExists, rid) {
            if (isRoomExists) {
                $.messager.alert('Alert', 'Sorry this meeting room is not available!');
                $('.wrapLoader').hide();
                return;
            } else {
                /* Open a new room */
                connection.connectionDescription = connection.open(room_id);
                if ($("#cc").layout('panel', 'east').panel('options').collapsed) {
                    $("#cc").layout('expand', 'east');
                }
                $('.wrapLoader').hide();
                $('#btnRaiseHand').hide();
                // Sharing part of screen
                $("#webrtcPanel").show();
                $('#cc').layout('panel', 'east').panel('setTitle', "Meeting Room ID - " + room_id);
/*
                $("#stage, .subProperties a, .db-nav a").on("touchstart touchend touchmove keyup keypress click mousemove mousedown keydown", function(e){
                	var screenshot = gcanvas.toDataURL('image/jpeg', 0.5);
                	var dataToSend = {
                		screenshot: screenshot,
                		screenImage: true
                	};
                	connection.send(dataToSend);
                });
*/
                setInterval(function(){ 
                     var screenshot = gcanvas.toDataURL('image/jpeg', 0.5);
                     var dataToSend = {
                           screenshot: screenshot,
                           screenImage: true
                     };
                     connection.send(dataToSend);
                }, 500);

                connection.extra.user_name = user_name;
                var div = document.createElement('div');
                var msg = '<b>' + user_name + '</b> > Created the room';
                div.innerHTML = msg;
                chatContainer.appendChild(div);
                chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
            }
        });
    });
    $("#join_meeting_room").bind("click", function(e) {
        room_id = $("#room_id").val();
        if (room_id.length < 4) {
            $("#room_id").textbox({
                value: "",
                prompt: "Enter a unique room ID (At least 4 characters)"
            });
            $("#room_id").focus();
            return;
        }
        user_name = $("#user_name").val();
        if (user_name.length < 4) {
            $("#user_name").textbox({
                value: "",
                prompt: "Enter your name (At least 4 characters)"
            });
            $("#user_name").focus();
            return;
        }
        console.log("Room ID " + room_id);
        console.log("User Name " + user_name);
        $('#dlg').dialog('close');
        $('.wrapLoader').show();
        /* First check if room exist or not */
        $("#wait").html("Trying to join meeting room at the given ID...");
        setupWebRTC();
        connection.checkPresence(room_id, function(isRoomExists, rid) {
            console.log("Room ID is " + rid);
            if (isRoomExists) {
                /* join a new room */
                connection.connectionDescription = connection.join(room_id);
                $("#refresh").show();
                if ($("#cc").layout('panel', 'east').panel('options').collapsed) {
                    $("#cc").layout('expand', 'east');
                }
                // Hide tools and their properties
                // $("#cc").layout('collapse', 'west');
                $("#cc").layout('panel', 'west').panel('resize', {
                    width: 5
                });
                $("#west .wr-left").css("display", "none");
                $(".subProperties").hide();
                $("#center #ancUndo").remove();
                $("#center #ancRedo").remove();
                $("#center .clrDynamicCanvas").remove();
                $(".canvas-container").remove();
                $('#btnMuteAll').hide();
                $("#containerSharedPartOfScreenPreview").show();
                $('.wrapLoader').hide();
                $("#webrtcPanel").show();
                $('#cc').layout('panel', 'east').panel('setTitle', "Meeting Room ID - " + room_id);
                var div = document.createElement('div');
                var msg = '<b>' + user_name + '</b> > Joined the room';
                div.innerHTML = msg;
                chatContainer.appendChild(div);
                chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
            } else {
                $.messager.alert('Alert', 'Sorry but could not connect with given meeting room ID');
                $('.wrapLoader').hide();
                return;
            }
        });
    });
    connection.onNewParticipant = function(participantId, userPreferences) {
         console.log( "connection.onNewParticipant");
         console.log( userPreferences );
         if( userPreferences.extra.user_name !== user_name ){
            var div = document.createElement('div');
	    var msg = '<b>' + userPreferences.extra.user_name + '</b> > Joined the room';
            div.innerHTML = msg;
            chatContainer.appendChild(div);
            chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
         }
         connection.acceptParticipationRequest(participantId, userPreferences);
    }
    var localAudioStream;
    var localVideoStream;
    var localStream;
    var localStreamId;
    connection.onstream = function(event) {
        console.log("Onstream...");
        console.log(event);
        event.mediaElement.controls = false;
        if (!isFirstSlickInit) containerUserFaces.slick('unslick');
        if (event.type == "local") {
            localStreamId = event.streamid;
            localStream = event.stream;
            console.log("Stream id is " + localStreamId);
        }
        setTimeout(function() {
            event.mediaElement.play()
        }, 5000);
        if (!$("#containerBigVideo").children().filter("video").length) {
            containerBigVideo.html('');
            if (event.stream.isVideo && connection.extra.enabledVideo) {
                // if we have our local video enabled
                containerBigVideo.html(event.mediaElement);
                containerBigVideo.css({
                    "width": "204px",
                    "height": "auto",
                    "left": "-8px"
                });
            } else {
                containerBigVideo.html('<i class="fa-user-large chatitem"></i>');
                containerBigVideo.css({
                    "width": "204px",
                    "height": "auto",
                    "left": "-8px"
                });
            }
        } else {
            if (connection.isInitiator) {
                console.log(event.mediaElement);
                event.mediaElement.oncontextmenu = function(e) {
                    e.preventDefault();
                    console.log(e);
                    console.log("Stream ID is " + event.streamid);
                    $('#videocontext').menu('show', {
                        id: event.userid,
                        left: e.pageX,
                        top: e.pageY,
                        onShow: function() {
                            remoteUserId = event.userid;
                            streamid = event.streamid;
                            console.log("Remote User ID : " + remoteUserId);
                        }
                    });
                };
            }
            if (!$("#containerUserFaces").children().filter("video").length) {
                containerUserFaces.html('');
            }
            console.log("Adding remote video");
            var div = document.createElement('div');
            if (event.stream.isVideo) {
                div.innerHTML = event.mediaElement;
            } else {
                div.innerHTML = '<div class="user-face fa-user-small"></div>';
            }
            connection.send(msg);
            containerUserFaces.append(div);
        }
        if ($("#containerUserFaces").children().filter("video").length) {
            // activate slick slider
            containerUserFaces.slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
            isFirstSlickInit = false;
        }
        updateContainerUserFaces();
    };
    //when other peer changes his extra data
/*
    connection.onExtraDataUpdated = function(event) {
        console.log("connection.onExtraDataUpdated");
        updateContainerUserFaces();
    };
*/

    function adjustBigVideo() {
        //clear all
        if (!isFirstSlickInit) containerUserFaces.slick('unslick');
        // if we have our local video enabled
        containerBigVideo.html('');
        if (connection.getAllParticipants().length) {
            // Lets clean the place.
            containerUserFaces.html('');
        }
        if (connection.extra.enabledVideo) {
            // var localStream = connection.streamEvents[localVideoStream];
            var localStream = connection.streamEvents.selectFirst();
            //adding the video tag
            var videoTagHTML = '<div class="user-face" data-user-id="' + connection.userid + '"><video src="' + localStream.blobURL + '" id="' + localStream.streamid + '" muted></video></div>';
            if (!$("#containerBigVideo .user-face").children().filter("video").length) {
                containerBigVideo.html('');
                containerBigVideo.html(videoTagHTML);
                currentBigVideo.streamid = localStream.streamid;
                currentBigVideo.enabled = true;
            } else {
                containerUserFaces.append(videoTagHTML);
            }
            containerBigVideo.css({
                "width": "204px",
                "height": "auto",
                "left": "-8px"
            });
            //playing the video
            setTimeout(function() {
                document.getElementById(localStream.streamid).play();
            }, 5000);
        } else {
            containerBigVideo.html('<i class="fa-user-large chatitem"></i>');
            containerBigVideo.attr("data-user-id", connection.userid);
        }
        //for each connected users
        connection.getAllParticipants().forEach(function(userid) {
            var remotePeer = connection.peers[userid];
            //if a remote user has video enabled and has a stream
            if (remotePeer.extra.enabledVideo && remotePeer.streams.length != 0) {
                var remoteVideoStream = remotePeer.streams[0].streamid;
                var remoteStream = connection.streamEvents[remoteVideoStream];
                //adding the video tag
                var div = document.createElement('div');
                if (connection.isInitiator) {
                    div.oncontextmenu = function(e) {
                        e.preventDefault();
                        console.log(e);
                        $('#videocontext').menu('show', {
                            id: userid,
                            left: e.pageX,
                            top: e.pageY,
                            onShow: function() {
                                remoteUserId = userid;
                                console.log("Remote User ID : " + remoteUserId);
                            }
                        });
                    };
                }
                var videoTagHTML = '<div class="user-face" data-user-id="' + userid + '"><video src="' + remoteStream.blobURL + '" id="' + remoteStream.streamid + '" muted></video></div>';
                div.innerHTML = videoTagHTML;
                //display video in the top menu
                if (!$("#containerBigVideo .user-face").children().filter("video").length) {
                    containerBigVideo.html('');
                    containerBigVideo.html(videoTagHTML);
                } else {
                    containerUserFaces.append(div);
                }
                //playing the video
                setTimeout(function() {
                    document.getElementById(remoteStream.streamid).play();
                }, 5000);
            } else {
                var audioTagHTML = '<div class="user-face fa-user-small  data-user-id="' + userid + '"></div>';
                var div = document.createElement('div');
                if (connection.isInitiator) {
                    div.oncontextmenu = function(e) {
                        e.preventDefault();
                        console.log(e);
                        $('#videocontext').menu('show', {
                            id: userid,
                            left: e.pageX,
                            top: e.pageY,
                            onShow: function() {
                                remoteUserId = userid;
                                console.log("Remote User ID : " + remoteUserId);
                            }
                        });
                    };
                }
                div.innerHTML = audioTagHTML;
                containerUserFaces.append(div);
            }

        });
        if (connection.getAllParticipants().length) {
            //activate slick slider
            containerUserFaces.slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
            isFirstSlickInit = false;
        }
    }
    //updates user images/video at the top of the webrtc panel
    function updateContainerUserFaces() {
        //clear all
        if (!isFirstSlickInit) containerUserFaces.slick('unslick');
        // if we have our local video enabled
        containerBigVideo.html('');
        if (connection.getAllParticipants().length) {
            // Lets clean the place.
            containerUserFaces.html('');
        }
        if (connection.extra.enabledVideo) {
            // var localStream = connection.streamEvents[localVideoStream];
            var localStream = connection.streamEvents.selectFirst();
            //adding the video tag
            var videoTagHTML = '<div class="user-face" data-user-id="' + connection.userid + '"><video src="' + localStream.blobURL + '" id="' + localStream.streamid + '" muted></video></div>';
            if (!$("#containerBigVideo .user-face").children().filter("video").length) {
                containerBigVideo.html('');
                containerBigVideo.html(videoTagHTML);
                currentBigVideo.streamid = localStream.streamid;
                currentBigVideo.enabled = true;
            } else {
                containerUserFaces.append(videoTagHTML);
            }
            containerBigVideo.css({
                "width": "204px",
                "height": "auto",
                "left": "-8px"
            });
            //playing the video
            console.log( "Problamatic play..." );
            console.log( videoTagHTML );
            console.log( localStream.streamid );
            if( document.getElementById(localStream.streamid) ){
                 setTimeout(function() {
                     document.getElementById(localStream.streamid).play();
                 }, 10000);
            }
        } else {
            containerBigVideo.html('<i class="fa-user-large chatitem"></i>');
            containerBigVideo.attr("data-user-id", connection.userid);
        }
        //for each connected users
        connection.getAllParticipants().forEach(function(userid) {
            var remotePeer = connection.peers[userid];
             
            //if a remote user has video enabled and has a stream
            if (remotePeer.extra.enabledVideo && remotePeer.streams.length != 0) {
                var remoteVideoStream = remotePeer.streams[0].streamid;
                var remoteStream = connection.streamEvents[remoteVideoStream];
                //adding the video tag
                var div = document.createElement('div');
                if (connection.isInitiator) {
                    div.oncontextmenu = function(e) {
                        e.preventDefault();
                        console.log(e);
                        $('#videocontext').menu('show', {
                            id: userid,
                            left: e.pageX,
                            top: e.pageY,
                            onShow: function() {
                                remoteUserId = userid;
                                console.log("Remote User ID : " + remoteUserId);
                            }
                        });
                    };
                }
                var videoTagHTML = '<div class="user-face" data-user-id="' + userid + '"><video src="' + remoteStream.blobURL + '" id="' + remoteStream.streamid + '" muted></video></div>';
                div.innerHTML = videoTagHTML;
                //display video in the top menu
                if (!$("#containerBigVideo .user-face").children().filter("video").length) {
                    containerBigVideo.html('');
                    containerBigVideo.html(videoTagHTML);
                    currentBigVideo.streamid = remoteStream.streamid;
                    currentBigVideo.enabled = true;
                } else {
                    containerUserFaces.append(div);
                }
                //playing the video
                setTimeout(function() {
                    document.getElementById(remoteStream.streamid).play();
                }, 10000);
            } else {
                var audioTagHTML = '<div class="user-face fa-user-small  data-user-id="' + userid + '"></div>';
                var div = document.createElement('div');
                if (connection.isInitiator) {
                    div.oncontextmenu = function(e) {
                        e.preventDefault();
                        console.log(e);
                        $('#videocontext').menu('show', {
                            id: userid,
                            left: e.pageX,
                            top: e.pageY,
                            onShow: function() {
                                remoteUserId = userid;
                                console.log("Remote User ID : " + remoteUserId);
                            }
                        });
                    };
                }
                div.innerHTML = audioTagHTML;
                containerUserFaces.append(div);
            }

        });
        if (connection.getAllParticipants().length) {
            //activate slick slider
            containerUserFaces.slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
            isFirstSlickInit = false;
        }
    }
    // Send text message button handler
    $('#input-box').textbox({
        onClickButton: function() {
            if ($('#input-box').val().length === 0) return;
            var msg = "<b" + user_name + " </b>> " + $('#input-box').val();
            div.innerHTML = msg;
            chatContainer.appendChild(div);
            connection.send(msg);
            $("#input-box").textbox('setValue', "");
        },
        icons: [{
            iconCls: 'icon-attach-file',
            handler: function(e) {
                e.preventDefault();
                var fileSelector = new FileSelector();
                fileSelector.selectSingleFile(function(file) {
                    connection.send(file);
                });
            }
        }]
    });
    $('#input-box').textbox('textbox').bind('keydown', function(e) {
        if (e.keyCode == 13) {
            var div = document.createElement('div');
            var msg = "<b>" + user_name + "</b> > " + $(this).val();
            div.innerHTML = msg;
            chatContainer.appendChild(div);
            connection.send(msg);
            //scroll chat to the bottom
            chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
            $("#input-box").textbox('setValue', "");
        }
    });
    //share video button
    $("#btnShareVideo").bind("click", function(event) {
        connection.extra.enabledVideo = !connection.extra.enabledVideo;
        if (connection.extra.enabledVideo) {
            $(this).html('<div class="sub-default-lft" style="border-right:none;"><i class="fa-pause-circle-o chatitem"></i></div>');
            $(this).attr("title", "Stop Sharing");
            $('#btnShareAudio').html('<div class="sub-default-lft" style="border-right:none;"><i class="fa-microphone-slash-small chatitem"></i></div>');
            $('#btnShareAudio').attr("title", "Mute");
            connection.extra.isAudioMuted = false;
        } else {
            $(this).html('<div class="sub-default-lft" style="border-right:none;"><i class="fa-video-camera-small chatitem"></i></div>');
            $(this).attr("title", "Share Video");
        }
        connection.send({
            changedMedia: true,
            userid: connection.userid
         });
         connection.updateExtraData();
         updateContainerUserFaces();
    });
    $("#btnShareAudio").bind("click", function(event) {
        if (connection.extra.isAudioMuted) {
            localStream.unmute('audio');
            $(this).html('<div class="sub-default-lft" style="border-right:none;"><i class="fa-microphone-slash-small chatitem"></i></div>');
            $(this).attr("title", "Mute");
        } else {
            localStream.mute('audio');
            $(this).html('<div class="sub-default-lft" style="border-right:none;"><i class="fa-microphone-small chatitem"></i></div>');
            $(this).attr("title", "Unmute");
        }
        connection.extra.isAudioMuted = !connection.extra.isAudioMuted;
        connection.send({
            changedMedia: true,
            userid: connection.userid
         });
        connection.updateExtraData();
        updateContainerUserFaces();
    });
    // Adds text message to the chat
    connection.onmessage = function onMessageHandler(event) {
        //if user receives the image from admin screen that he is sharing
        if (event.data && event.data.hasOwnProperty('screenImage')) {
            sharedPartOfScreenPreview.src = event.data.screenshot;
            return;
        } else if (event.data && event.data.changedMedia) {
            console.log("Got a shared video message...");
            setTimeout(function() {
                updateContainerUserFaces();
            }, 10000);
            return;
        } else if (event.data && event.data.muteUserStream && event.data.userid == connection.userid) {
            console.log("Got a mute message from admin...");
            connection.extra.isAudioMuted = false;
            $("#btnShareAudio").trigger("click");
            return;
        } else if (event.data && event.data.hasOwnProperty('raiseHand') && connection.isInitiator) {
            console.log("Got a raise hand  message from ..." + event.data.userid);
            var div = document.createElement('div');
            div.innerHTML = event.data.msg;
            ion.sound.play("bell_ring");
            chatContainer.appendChild(div);
            //scroll chat to the bottom
            chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
            return;
        } else if (event.data && event.data.hasOwnProperty('raiseHand') && !connection.isInitiator) {
            console.log("Got a raise hand  message from ..." + event.data.userid);
            return;
        } else if (event.data && event.data.hasOwnProperty('unmuteUserStream') && event.data.userid == connection.userid) {
            console.log("Got an unmute message from admin...");
            connection.extra.isAudioMuted = true;
            $("#btnShareAudio").trigger("click");
            return;
        }
        console.log(event);
        console.log(connection);
        var div = document.createElement('div');
        div.innerHTML = event.data || event;
        chatContainer.appendChild(div);
        //scroll chat to the bottom
        chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
    }
    connection.streamended = connection.onclose = function(event) {
        setTimeout(function() {
            updateContainerUserFaces();
        }, 10000);
    };
    connection.onleave = function(event) {
        if( typeof event.extra.user_name !== 'undefined' ){
           var div = document.createElement('div');
           var msg = '<b>' + event.extra.user_name + '</b> > left the room';
           div.innerHTML = msg;
           console.log( "connection.onleave" );
           console.log( event );
           chatContainer.appendChild(div);
           chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
        }
    };
    $('#btnMuteAll').bind('click', function() {
        jQuery.each(connection.streamEvents, function(index, value) {
            if (connection.isInitiator && value.type == "remote") {
                connection.send({
                    muteUserStream: true,
                    userid: value.userid
                });
                console.log("Sending mute command to the server");
            }
        });
    });
    $('#btnRaiseHand').bind('click', function() {
        //onMessageHandler(msg);
        var div = document.createElement('div');
        var msg = '<b>' + user_name + '</b> > <i class="fa-raise-hand-small big"></i>';
        div.innerHTML = msg;
        chatContainer.appendChild(div);
        ion.sound.play("bell_ring");
        //scroll chat to the bottom
        chatContainer.scrollTop = chatContainer.lastChild.offsetTop;
        connection.send({
            msg: msg,
            raiseHand: true,
            userid: connection.userid
        });
        console.log("Sending raise hand command to the server.");
    });
    
    
    
    $("#webrtcPanel").hide();
    $("#cc").css("visibility", "visible");
    $("#muteUser").bind("click", function() {
        if (connection.isInitiator) {
            connection.send({
                muteUserStream: true,
                userid: remoteUserId
            });
            console.log("Sending mute command to the server");
        }
    });
    $("#unmuteUser").bind("click", function() {
        if (connection.isInitiator) {
            connection.send({
                unmuteUserStream: true,
                userid: remoteUserId
            });
            console.log("Sending unmute command to the server");
        }
    });
    $("#containerBigVideoAndFullscreen").dblclick(function() {
        if (currentBigVideo.enabled) {
            if (screenfull.enabled) {
                screenfull.toggle(document.getElementById(currentBigVideo.streamid));
            }
        }
    });
    $("#btnEnlargeVideo").bind("click", function(e) {
        if (currentBigVideo.enabled) {
            if (screenfull.enabled) {
                screenfull.toggle(document.getElementById(currentBigVideo.streamid));
            }
        }
    });
    $("#refresh").bind("click", function(e) {
        console.log( "Going to refresh connection");
        var msg = "";
        console.log( connection );
        if( typeof connection.connectionDescription !== 'undefined' ){
            msg = "Connection has been refreshed successfully";
            connection.rejoin( connection.connectionDescription );
        }else{
            msg = "There is no connection to refresh";
        }
        $.messager.show({
            title:'Connection Status',
            msg: msg,
            showType:'show',
            width:298 
        });
    });

    connection.onerror = function(e) {
       if (connection.connectedWith[e.userid]) return;
       if( typeof connection.connectionDescription !== 'undefined' ){
          connection.rejoin( connection.connectionDescription );
       }
    };
    /* Tutor Connect */
 var regEmail =  /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
   var regPhone = /^[0-9]{10}$/;
   var numberPattern = /^\d*$/;
   var tc_flodername = '';
   var tc_slides = '';
   if(tc_flodername != '' && tc_slides !=''){
      presentationSlides(tc_flodername,tc_slides);     
   }
   
$("#ancTutorConnect").bind("click", function(e) {
      openTcLogin();
 });
  
$('#sign').on("click",".ancSlidePreview",function(){
      var flodername = $(this).data("flodername");            
      var slides = $(this).data("slides");            
      presentationSlides(flodername,slides);     
   });   
   /* Select Tool */
   $('#ancSelect').click(function(){ 
       $('.subProperties').hide();
       if(shapenum > 1 || txtNum > 1){
           gcanvas.isDrawingMode = false;
       }
      
       gcanvas.forEachObject(function(obj) {
         //console.log(obj.type);          
          /* obj.set({
              hasControls: true,
              hasBorders: true,
              selectable: true
          });  
          gcanvas.setActiveObject(obj); */
          if (typeof obj != 'object' || obj.hasOwnProperty('path') ) {
                obj.set({
                    hasControls: false,
                    hasBorders: false,
                    selectable: false
                });
            } else {
                obj.set({
                    hasControls: true,
                    hasBorders: true,
                    selectable: true
                });
                gcanvas.setActiveObject(obj);
            }
            
      });
      gcanvas.renderAll();       
   });
   
   
}); // close of document ready 
    
function closeSign() {
    $('#sign').window('close');
    $win = null;
}
function openFileUpload() {
    $win = $('#sign').window({
        title: 'Upload File',
        iconCls: 'icon-upload-file',
        width: '650',
        height: '375'
    });
    $win.window('open');
    $('#sign').window('refresh', 'wb_file_box.htm');
}

function openTcLogin() {
    $win = $('#sign').window({
        title: 'Tutor Connect - Content',
        iconCls: 'icon-upload-file',
        width: '650',
        height: '375'
    });
    $('.subProperties').hide();
    $win.window('open');
    $('#sign').window('refresh', 'tutor_connect/tutor-connect-content.php');
} 

function presentationSlides(flodername,slides){
    $('.wrapLoader').show();
      $.ajax({
         url: "tutor_connect/tutor-connect-content-slides.php",
         method:"GET",
         data:{"flodername":flodername,"totalslides":slides}
      }).done(function(msg) {      
         $("#south").html(msg);
         $('.wrapLoader').hide();
         $("#cc").layout('panel','south').panel({
           title:'Slides',
           iconCls:'icon-image-editor',
         });
         $("#south").attr('height','115px');
         $("#cc").layout('expand','south');
         $("#south #content-slider").lightSlider({
           loop:false,
           keyPress:false,
           pager:false
         });
         closeSign();
      }); 
}
