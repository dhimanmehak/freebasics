@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">

        <div class="grid_6">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Cahrt 5</h6>
                </div>
                <div class="widget_content">
                    <h3>Header</h3>
                    <p>
                        Cras erat diam, consequat quis tincidunt nec, eleifend a turpis. Aliquam ultrices feugiat metus, ut imperdiet erat mollis at. Curabitur mattis risus sagittis nibh lobortis vel.
                    </p>
                    <div id="chart5" class="chart_block jqplot-target" style="position: relative;">
                        <canvas width="485" height="340" class="jqplot-base-canvas" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="jqplot-title" style="position: absolute; top: 0px; left: 0px; width: 485px; text-align: center;"> </div><canvas width="485" height="340" class="jqplot-grid-canvas" style="position: absolute; left: 0px; top: 0px;"></canvas><canvas width="465" height="310" class="jqplot-series-shadowCanvas" style="position: absolute; left: 10px; top: 7px;"></canvas><canvas width="465" height="310" class="jqplot-series-canvas" style="position: absolute; left: 10px; top: 7px;"></canvas><table class="jqplot-table-legend" style="position: absolute; left: 10px; top: 72px;"><tbody><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0px;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(75, 178, 197); background-color: rgb(75, 178, 197);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0px;">Verwerkende industrie</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(234, 162, 40); background-color: rgb(234, 162, 40);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Retail</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(197, 180, 127); background-color: rgb(197, 180, 127);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Primaire producent</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(87, 149, 117); background-color: rgb(87, 149, 117);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Out of home</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(131, 149, 87); background-color: rgb(131, 149, 87);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Groothandel</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(149, 140, 18); background-color: rgb(149, 140, 18);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Grondstof</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(149, 53, 121); background-color: rgb(149, 53, 121);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Consument</td></tr><tr class="jqplot-table-legend"><td class="jqplot-table-legend jqplot-table-legend-swatch" style="text-align: center; padding-top: 0.5em;"><div class="jqplot-table-legend-swatch-outline"><div class="jqplot-table-legend-swatch" style="border-color: rgb(75, 93, 228); background-color: rgb(75, 93, 228);"></div></div></td><td class="jqplot-table-legend jqplot-table-legend-label" style="padding-top: 0.5em;">Bewerkende industrie</td></tr></tbody></table><canvas width="465" height="310" class="jqplot-pieRenderer-highlight-canvas" style="position: absolute; left: 10px; top: 7px;"></canvas><div class="jqplot-pie-series jqplot-data-label" style="position: absolute; left: 329px; top: 88px;">64%</div><div class="jqplot-pie-series jqplot-data-label" style="position: absolute; left: 296px; top: 231px;">21%</div><div class="jqplot-pie-series jqplot-data-label" style="position: absolute; left: 229px; top: 189px;">14%</div><div class="jqplot-cursor-tooltip" style="position: absolute; display: none;"></div><canvas width="465" height="310" class="jqplot-highlight-canvas" style="position: absolute; left: 10px; top: 7px;"></canvas><div class="jqplot-highlighter-tooltip" style="position: absolute; display: none;"></div><canvas width="465" height="310" class="jqplot-event-canvas" style="position: absolute; left: 10px; top: 7px;"></canvas></div>
                </div>
            </div>
        </div>
        <div class="grid_6">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Content</h6>
                </div>
                <div class="widget_content">
                    <h3>Content Table</h3>
                    <p>
                        Cras erat diam, consequat quis tincidunt nec, eleifend a turpis. Aliquam ultrices feugiat metus, ut imperdiet erat mollis at. Curabitur mattis risus sagittis nibh lobortis vel.
                    </p>
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Admin Name
                                </th>
                                <th>
                                    Admin Type
                                </th>
                                <th>
                                    Last Login Date
                                </th>
                                <th>
                                    Last Logout Date
                                </th>
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">01</a>
                                </td>
                                <td>
                                    <a href="#">Pellentesque ut massa ut ligula ... </a>
                                </td>
                                <td class="sdate center">
                                    1st FEB 2012
                                </td>
                                <td class="center">
                                    Jaman
                                </td>
                                <td class="center">
                                    <span class="badge_style b_done">Publish</span>
                                </td>
                                <td class="center sdate">
                                    3rd FEB 2012
                                </td>
                                <td class="center sdate">
                                    3rd FEB 2012
                                </td>
                                <td class="center">
                                    <span><a class="action-icons c-edit" href="#" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="#" title="delete">Delete</a></span><span><a class="action-icons c-approve" href="#" title="Approve">Publish</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">02</a>
                                </td>
                                <td>
                                    <a href="#">Nulla non ante dui, sit amet ... </a>
                                </td>
                                <td class="sdate center">
                                    1st FEB 2012
                                </td>
                                <td class="center">
                                    Jhon
                                </td>
                                <td class="center">
                                    <span class="badge_style b_done">Publish</span>
                                </td>
                                <td class="center sdate">
                                    3rd FEB 2012
                                </td>
                                <td class="center sdate">
                                    3rd FEB 2012
                                </td>
                                <td class="center">
                                    <span><a class="action-icons c-edit" href="#" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="#" title="delete">Delete</a></span><span><a class="action-icons c-approve" href="#" title="Approve">Publish</a></span>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Admin Name
                                </th>
                                <th>
                                    Admin Type
                                </th>
                                <th>
                                    Last Login Date
                                </th>
                                <th>
                                    Last Logout Date
                                </th>
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
