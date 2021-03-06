<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
    <title>{{Config::get('adminconfig.sitetitle')}}</title>

    <link href="{{URL::to('admin/css/reset.css');}}" rel="stylesheet" type="text/css"> 
    <!--  <link href="{{URL::to('admin/css/bootstrap-datetimepicker.min.css');}}" rel="stylesheet" type="text/css">
          <link rel="stylesheet" media="all" href="{{URL::to('admin/css/date/datepicker.css');}}" type="text/css" />  -->


    <link href="{{URL::to('admin/css/reset.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/layout.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/themes.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/typography.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/styles.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/shCore.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/bootstrap.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/jquery.jqplot.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/jquery-ui-1.8.18.custom.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/data-table.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/form.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/ui-elements.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/wizard.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/sprite.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/gradient.css');}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('admin/css/font-awesome.css');}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{Config::get('adminconfig.favicon');}}" type="image/x-icon" />
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="admin/css/ie/ie7.css" />
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="admin/css/ie/ie8.css" />
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="admin/css/ie/ie9.css" />
    <![endif]-->
    <!-- Jquery -->

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
$(document).ready(function () {
    $('#showmenu').click(function () {
        $('.sidebarmenu').toggle();
    });
});
    </script>
    <link href="{{URL::to('admin/colorpicker/dist/css/bootstrap-colorpicker.min.css');}}" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{URL::to('admin/colorpicker/dist/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{URL::to('admin/colorpicker/src/js/docs.js')}}"></script>

    <script src="admin/js/jquery-1.7.1.min.js"></script>

    <script src="admin/js/jquery-ui-1.8.18.custom.min.js"></script>
    <script src="admin/js/jquery.ui.touch-punch.js"></script>
    <script src="admin/js/chosen.jquery.js"></script>
    <script src="admin/js/uniform.jquery.js"></script>
    <script src="admin/js/bootstrap-dropdown.js"></script>
    <script src="admin/js/bootstrap-colorpicker.js"></script>
    <script src="admin/js/sticky.full.js"></script>
    <script src="admin/js/jquery.noty.js"></script>
    <script src="admin/js/selectToUISlider.jQuery.js"></script>
    <script src="admin/js/fg.menu.js"></script>
    <script src="admin/js/jquery.tagsinput.js"></script>
    <script src="admin/js/jquery.cleditor.js"></script>
    <script src="admin/js/jquery.tipsy.js"></script>
    <script src="admin/js/jquery.peity.js"></script>
    <script src="admin/js/jquery.simplemodal.js"></script>
    <script src="admin/js/jquery.jBreadCrumb.1.1.js"></script>
    <script src="admin/js/jquery.colorbox-min.js"></script>
    <script src="admin/js/jquery.idTabs.min.js"></script>
    <script src="admin/js/jquery.multiFieldExtender.min.js"></script>
    <script src="admin/js/jquery.confirm.js"></script>
    <script src="admin/js/elfinder.min.js"></script>
    <script src="admin/js/accordion.jquery.js"></script>
    <script src="admin/js/autogrow.jquery.js"></script>
    <script src="admin/js/check-all.jquery.js"></script>
    <script src="admin/js/data-table.jquery.js"></script>
    <script src="admin/js/ZeroClipboard.js"></script>
    <script src="admin/js/TableTools.min.js"></script>
    <script src="admin/js/jeditable.jquery.js"></script>
    <script src="admin/js/duallist.jquery.js"></script>
    <script src="admin/js/easing.jquery.js"></script>
    <script src="admin/js/full-calendar.jquery.js"></script>
    <script src="admin/js/input-limiter.jquery.js"></script>
    <script src="admin/js/inputmask.jquery.js"></script>
    <script src="admin/js/iphone-style-checkbox.jquery.js"></script>
    <script src="admin/js/meta-data.jquery.js"></script>
    <script src="admin/js/quicksand.jquery.js"></script>
    <script src="admin/js/raty.jquery.js"></script>
    <script src="admin/js/smart-wizard.jquery.js"></script>
    <script src="admin/js/stepy.jquery.js"></script>
    <script src="admin/js/treeview.jquery.js"></script>
    <script src="admin/js/ui-accordion.jquery.js"></script>
    <script src="admin/js/vaidation.jquery.js"></script>
    <script src="admin/js/mosaic.1.0.1.min.js"></script>
    <script src="admin/js/jquery.collapse.js"></script>
    <script src="admin/js/jquery.cookie.js"></script>
    <script src="admin/js/jquery.autocomplete.min.js"></script>
    <script src="admin/js/localdata.js"></script>
    <script src="admin/js/excanvas.min.js"></script>
    <script src="admin/js/jquery.jqplot.min.js"></script>


    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> <!-- By Rvd -->
    <script>
$(function () {
    $("#fundingdur").datepicker({
        startDate: "+1d",
        format: "yyyy-mm-dd",
        minDate: 0,
        endDate: "+60d",
    });
});
    </script>

    <link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
    <script type="text/javascript">
var today = new Date();
var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
$(document).ready(function () {
    $(".datepicker").datepicker({
        startDate: "+0d",
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"

    });
});
    </script>
    <script>
        $(document).on('focus', '.datepicker', function () {
            $(this).datepicker({
                startDate: "+0d",
                format: "mm-yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
        });
    </script>

    <script src="admin/js/chart-plugins/jqplot.dateAxisRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.cursor.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.logAxisRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.highlighter.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.pieRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.barRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.pointLabels.min.js"></script>
    <script src="admin/js/chart-plugins/jqplot.meterGaugeRenderer.min.js"></script>
    <script src="admin/js/custom-scripts.js"></script>
    <script src="admin/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="admin/js/tableExport/tableExport.js"></script>
    <script type = "text/javascript" src = "admin/js/tableExport/jquery.base64.js"></script>
    <script type="text/javascript" src="admin/js/tableExport/jspdf/libs/sprintf.js"></script>
    <script type = "text/javascript" src = "admin/js/tableExport/jspdf/jspdf.js" ></script>
    <script type = "text/javascript" src = "admin/js/tableExport/jspdf/libs/base64.js" ></script>
    <script>
        /*=================
         CHART 6
         ===================*/
        $(function () {
            var s1 = [[2002, 112000], [2003, 122000], [2004, 104000], [2005, 99000], [2006, 121000],
                [2007, 148000], [2008, 114000], [2009, 133000], [2010, 161000], [2011, 173000]];
            var s2 = [[2002, 10200], [2003, 10800], [2004, 11200], [2005, 11800], [2006, 12400],
                [2007, 12800], [2008, 13200], [2009, 12600], [2010, 13100]];
            plot1 = $.jqplot("chart6", [s2, s1], {
                // Turns on animatino for all series in this plot.
                animate: true,
                // Will animate plot on calls to plot1.replot({resetAxes:true})
                animateReplot: true,
                cursor: {
                    show: true,
                    zoom: false,
                    looseZoom: true,
                    showTooltip: false
                },
                series: [
                    {
                        pointLabels: {
                            show: true
                        },
                        renderer: $.jqplot.BarRenderer,
                        showHighlight: false,
                        yaxis: 'y2axis',
                        rendererOptions: {
                            // Speed up the animation a little bit.
                            // This is a number of milliseconds. 
                            // Default for bar series is 3000. 
                            animation: {
                                speed: 2500
                            },
                            barWidth: 15,
                            barPadding: -15,
                            barMargin: 0,
                            highlightMouseOver: false
                        }
                    },
                    {
                        rendererOptions: {
                            // speed up the animation a little bit.
                            // This is a number of milliseconds.
                            // Default for a line series is 2500.
                            animation: {
                                speed: 2000
                            }
                        }
                    }
                ],
                axesDefaults: {
                    pad: 0
                },
                axes: {
                    // These options will set up the x axis like a category axis.
                    xaxis: {
                        tickInterval: 1,
                        drawMajorGridlines: false,
                        drawMinorGridlines: true,
                        drawMajorTickMarks: false,
                        rendererOptions: {
                            tickInset: 0.5,
                            minorTicks: 1
                        }
                    },
                    yaxis: {
                        tickOptions: {
                            formatString: "$%'d"
                        },
                        rendererOptions: {
                            forceTickAt0: true
                        }
                    },
                    y2axis: {
                        tickOptions: {
                            formatString: "$%'d"
                        },
                        rendererOptions: {
                            // align the ticks on the y2 axis with the y axis.
                            alignTicks: true,
                            forceTickAt0: true
                        }
                    }
                },
                highlighter: {
                    show: true,
                    showLabel: true,
                    tooltipAxes: 'y',
                    sizeAdjust: 7.5, tooltipLocation: 'ne'
                },
                grid: {
                    borderColor: '#ccc', // CSS color spec for border around grid.
                    borderWidth: 2.0, // pixel width of border around grid.
                    shadow: false               // draw a shadow for grid.
                },
                seriesDefaults: {
                    lineWidth: 2, // Width of the line in pixels.
                    shadow: false, // show shadow or not.
                    markerOptions: {
                        show: true, // wether to show data point markers.
                        style: 'filledCircle', // circle, diamond, square, filledCircle.
                        // filledDiamond or filledSquare.
                        lineWidth: 2, // width of the stroke drawing the marker.
                        size: 14, // size (diameter, edge length, etc.) of the marker.
                        color: '#ff8a00', // color of marker, set to color of line by default.
                        shadow: true, // wether to draw shadow on marker or not.
                        shadowAngle: 45, // angle of the shadow.  Clockwise from x axis.
                        shadowOffset: 1, // offset from the line of the shadow,
                        shadowDepth: 3, // Number of strokes to make when drawing shadow.  Each stroke
                        // offset by shadowOffset from the last.
                        shadowAlpha: 0.07   // Opacity of the shadow
                    }
                }
            });
        });
        /*=================
         CHART 8
         ===================*/
        $(function () {
            var plot2 = $.jqplot('chart8', [[3, 7, 9, 1, 5, 3, 8, 2, 5]], {
                // Give the plot a title.
                title: 'Plot With Options',
                // You can specify options for all axes on the plot at once with
                // the axesDefaults object.  Here, we're using a canvas renderer
                // to draw the axis label which allows rotated text.
                axesDefaults: {
                    labelRenderer: $.jqplot.CanvasAxisLabelRenderer
                },
                // Likewise, seriesDefaults specifies default options for all
                // series in a plot.  Options specified in seriesDefaults or
                // axesDefaults can be overridden by individual series or
                // axes options.
                // Here we turn on smoothing for the line.
                seriesDefaults: {
                    shadow: false, // show shadow or not.
                    rendererOptions: {
                        smooth: true
                    }
                },
                // An axes object holds options for all axes.
                // Allowable axes are xaxis, x2axis, yaxis, y2axis, y3axis, ...
                // Up to 9 y axes are supported.
                axes: {
                    // options for each axis are specified in seperate option objects.
                    xaxis: {
                        label: "X Axis",
                        // Turn off "padding".  This will allow data point to lie on the
                        // edges of the grid.  Default padding is 1.2 and will keep all
                        // points inside the bounds of the grid.
                        pad: 0
                    },
                    yaxis: {
                        label: "Y Axis"
                    }
                },
                grid: {
                    borderColor: '#ccc', // CSS color spec for border around grid.
                    borderWidth: 2.0, // pixel width of border around grid.
                    shadow: false               // draw a shadow for grid.
                }
            });
        });
    </script>
    <script>
        function confirm_status(path) {
            var answer = confirm("Are you sure to change the status of this record?")
            if (answer) {
                location.href = path;
            }
        }
    </script>


</head>