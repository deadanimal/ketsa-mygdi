import { AfterViewInit, OnDestroy } from "@angular/core";
import { Component, Inject, NgZone, PLATFORM_ID } from "@angular/core";
import { isPlatformBrowser } from "@angular/common";

// amCharts imports
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_dark from "@amcharts/amcharts4/themes/dark";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

@Component({
  selector: "app-dashboard",
  templateUrl: "./dashboard.component.html",
  styleUrls: ["./dashboard.component.scss"],
})
export class DashboardComponent implements AfterViewInit, OnDestroy {
  private chart: am4charts.XYChart;

  constructor(@Inject(PLATFORM_ID) private platformId, private zone: NgZone) {}

  // Run the function only in the browser
  browserOnly(f: () => void) {
    if (isPlatformBrowser(this.platformId)) {
      this.zone.runOutsideAngular(() => {
        f();
      });
    }
  }

  ngAfterViewInit() {
    // Chart code goes in here
    this.browserOnly(() => {
      am4core.useTheme(am4themes_animated);

      //Chart 1 ------------------------>

      let chart = am4core.create("chartdiv", am4charts.XYChart);

      // Add data
      chart.data = [
        {
          agency: "BPM",
          metadata: 125,
        },
        {
          agency: "BPB",
          metadata: 80,
        },
        {
          agency: "BUP",
          metadata: 65,
        },
        {
          agency: "BPP",
          metadata: 70,
        },
        {
          agency: "BG",
          metadata: 30,
        },
      ];

      // Create axes
      let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "agency";
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.renderer.minGridDistance = 30;
      categoryAxis.renderer.labels.template.horizontalCenter = "right";
      categoryAxis.renderer.labels.template.verticalCenter = "middle";
      categoryAxis.renderer.labels.template.rotation = 270;
      categoryAxis.tooltip.disabled = true;
      categoryAxis.renderer.minHeight = 70;
      categoryAxis.title.text = "[bold grey] Bahagian";

      let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.renderer.minWidth = 50;
      valueAxis.title.text = "[bold grey] Jumlah Metadata";

      // Create series
      let series = chart.series.push(new am4charts.ColumnSeries());
      series.sequencedInterpolation = true;
      series.dataFields.valueY = "metadata";
      series.dataFields.categoryX = "agency";
      series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
      series.columns.template.strokeWidth = 0;

      series.tooltip.pointerOrientation = "vertical";

      series.columns.template.column.cornerRadiusTopLeft = 10;
      series.columns.template.column.cornerRadiusTopRight = 10;
      series.columns.template.column.fillOpacity = 0.8;

      // on hover, make corner radiuses bigger
      let hoverState = series.columns.template.column.states.create("hover");
      hoverState.properties.cornerRadiusTopLeft = 0;
      hoverState.properties.cornerRadiusTopRight = 0;
      hoverState.properties.fillOpacity = 1;

      series.columns.template.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      // Cursor
      chart.cursor = new am4charts.XYCursor();

      //Chart 2 ----------------------------->

      // Create chart instance
      let chart2 = am4core.create("chartdiv2", am4charts.XYChart);

      // Add data
      chart2.data = [
        {
          agency: "A",
          metadata: 3025,
        },
        {
          agency: "B",
          metadata: 1382,
        },
        {
          agency: "C",
          metadata: 925,
        },
        {
          agency: "D",
          metadata: 1282,
        },
        {
          agency: "E",
          metadata: 825,
        },
        {
          agency: "F",
          metadata: 1882,
        },
      ];

      // Create axes
      let categoryAxis2 = chart2.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis2.dataFields.category = "agency";
      categoryAxis2.renderer.grid.template.location = 0;
      categoryAxis2.renderer.minGridDistance = 30;
      categoryAxis2.renderer.labels.template.horizontalCenter = "right";
      categoryAxis2.renderer.labels.template.verticalCenter = "middle";
      categoryAxis2.renderer.labels.template.rotation = 270;
      categoryAxis2.tooltip.disabled = true;
      categoryAxis2.renderer.minHeight = 70;
      categoryAxis2.title.text = "[bold grey]Agensi";

      let valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());
      valueAxis2.renderer.minWidth = 50;
      valueAxis2.title.text = "[bold grey] Jumlah Metadata";

      // Create series
      let series2 = chart2.series.push(new am4charts.ColumnSeries());
      series2.sequencedInterpolation = true;
      series2.dataFields.valueY = "metadata";
      series2.dataFields.categoryX = "agency";
      series2.tooltipText = "[{categoryX}: bold]{valueY}[/]";
      series2.columns.template.strokeWidth = 0;
      series2.columns.template.width = am4core.percent(50);

      series2.tooltip.pointerOrientation = "vertical";

      series2.columns.template.column.cornerRadiusTopLeft = 10;
      series2.columns.template.column.cornerRadiusTopRight = 10;
      series2.columns.template.column.fillOpacity = 0.8;

      // on hover, make corner radiuses bigger
      let hoverState2 = series2.columns.template.column.states.create("hover");
      hoverState2.properties.cornerRadiusTopLeft = 0;
      hoverState2.properties.cornerRadiusTopRight = 0;
      hoverState2.properties.fillOpacity = 1;

      series2.columns.template.adapter.add("fill", function (fill, target) {
        return chart2.colors.getIndex(target.dataItem.index);
      });

      // Cursor
      chart2.cursor = new am4charts.XYCursor();

      //Chart 3 ----------------------------->

      // Create chart instance
      let chart3 = am4core.create("chartdiv3", am4charts.XYChart);

      // Add data
      chart3.data = [
        {
          tahun: "2010",
          metadata: 3035,
        },
        {
          tahun: "2011",
          metadata: 1383,
        },
        {
          tahun: "2012",
          metadata: 935,
        },
        {
          tahun: "2013",
          metadata: 1383,
        },
        {
          tahun: "2014",
          metadata: 835,
        },
        {
          tahun: "2015",
          metadata: 1883,
        },
        {
          tahun: "2016",
          metadata: 1203,
        },
        {
          tahun: "2017",
          metadata: 1383,
        },
        {
          tahun: "2018",
          metadata: 983,
        },
        {
          tahun: "2019",
          metadata: 1883,
        },
        {
          tahun: "2020",
          metadata: 1583,
        },
      ];

      // Create axes
      let categoryAxis3 = chart3.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis3.dataFields.category = "tahun";
      categoryAxis3.renderer.grid.template.location = 0;
      categoryAxis3.renderer.minGridDistance = 30;
      categoryAxis3.renderer.labels.template.horizontalCenter = "middle";
      categoryAxis3.renderer.labels.template.verticalCenter = "middle";
      categoryAxis3.renderer.labels.template.rotation = 0;
      categoryAxis3.tooltip.disabled = true;
      categoryAxis3.renderer.minHeight = 70;
      categoryAxis3.title.text = "[bold grey]Agensi";

      let valueAxis3 = chart3.yAxes.push(new am4charts.ValueAxis());
      valueAxis3.renderer.minWidth = 50;
      valueAxis3.title.text = "[bold grey] Jumlah Metadata";

      // Create series
      let series3 = chart3.series.push(new am4charts.ColumnSeries());
      series3.sequencedInterpolation = true;
      series3.dataFields.valueY = "metadata";
      series3.dataFields.categoryX = "tahun";
      series3.tooltipText = "[{categoryX}: bold]{valueY}[/]";
      series3.columns.template.strokeWidth = 0;
      series3.columns.template.width = am4core.percent(15);

      series3.tooltip.pointerOrientation = "vertical";

      series3.columns.template.column.cornerRadiusTopLeft = 10;
      series3.columns.template.column.cornerRadiusTopRight = 10;
      series3.columns.template.column.fillOpacity = 0.8;

      // on hover, make corner radiuses bigger
      let hoverState3 = series3.columns.template.column.states.create("hover");
      hoverState3.properties.cornerRadiusTopLeft = 0;
      hoverState3.properties.cornerRadiusTopRight = 0;
      hoverState3.properties.fillOpacity = 1;

      series3.columns.template.adapter.add("fill", function (fill, target) {
        return chart3.colors.getIndex(target.dataItem.index);
      });

      // Cursor
      chart3.cursor = new am4charts.XYCursor();

      //Chart 4 ----------------------------->

      // Create chart instance
      let chart4 = am4core.create("chartdiv4", am4charts.XYChart);

      // Add data
      chart4.data = [
        {
          tahun: "2010",
          metadata: 3035,
        },
        {
          tahun: "2011",
          metadata: 1383,
        },
        {
          tahun: "2012",
          metadata: 935,
        },
        {
          tahun: "2013",
          metadata: 1383,
        },
        {
          tahun: "2014",
          metadata: 835,
        },
        {
          tahun: "2015",
          metadata: 1883,
        },
        {
          tahun: "2016",
          metadata: 1203,
        },
        {
          tahun: "2017",
          metadata: 1383,
        },
        {
          tahun: "2018",
          metadata: 983,
        },
        {
          tahun: "2019",
          metadata: 1883,
        },
        {
          tahun: "2020",
          metadata: 1583,
        },
      ];

      // Create axes
      let categoryAxis4 = chart4.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis4.dataFields.category = "tahun";
      categoryAxis4.renderer.grid.template.location = 0;
      categoryAxis4.renderer.minGridDistance = 30;
      categoryAxis4.renderer.labels.template.horizontalCenter = "middle";
      categoryAxis4.renderer.labels.template.verticalCenter = "middle";
      categoryAxis4.renderer.labels.template.rotation = 0;
      categoryAxis4.tooltip.disabled = true;
      categoryAxis4.renderer.minHeight = 70;
      categoryAxis4.title.text = "[bold grey]Agensi";

      let valueAxis4 = chart4.yAxes.push(new am4charts.ValueAxis());
      valueAxis4.renderer.minWidth = 50;
      valueAxis4.title.text = "[bold grey] Jumlah Metadata";

      // Create series
      let series4 = chart4.series.push(new am4charts.ColumnSeries());
      series4.sequencedInterpolation = true;
      series4.dataFields.valueY = "metadata";
      series4.dataFields.categoryX = "tahun";
      series4.tooltipText = "[{categoryX}: bold]{valueY}[/]";
      series4.columns.template.strokeWidth = 0;
      series4.columns.template.width = am4core.percent(15);

      series4.tooltip.pointerOrientation = "vertical";

      series4.columns.template.column.cornerRadiusTopLeft = 10;
      series4.columns.template.column.cornerRadiusTopRight = 10;
      series4.columns.template.column.fillOpacity = 0.8;

      // on hover, make corner radiuses bigger
      let hoverState4 = series4.columns.template.column.states.create("hover");
      hoverState4.properties.cornerRadiusTopLeft = 0;
      hoverState4.properties.cornerRadiusTopRight = 0;
      hoverState4.properties.fillOpacity = 1;

      series4.columns.template.adapter.add("fill", function (fill, target) {
        return chart4.colors.getIndex(target.dataItem.index);
      });

      // Cursor
      chart4.cursor = new am4charts.XYCursor();
    });

    
    //PieChart1 --------------------------->

    // Create chart instance
    let piechart = am4core.create("piechartdiv", am4charts.PieChart);

    // Add data
    piechart.data = [
      {
        category: "Imagery Base Maps-Earth Cover",
        metadata: 501.9,
      },
      {
        category: "Geoscientific Information",
        metadata: 301.9,
      },
      {
        category: "Transportation",
        metadata: 201.1,
      },
      {
        category: "Inland Waters",
        metadata: 165.8,
      },
      {
        category: "Climatology Meteorology Atmosphere",
        metadata: 139.9,
      },
    ];

    // Add and configure Series
    let pieSeries = piechart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "metadata";
    pieSeries.dataFields.category = "category";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeOpacity = 1;

    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;

    piechart.hiddenState.properties.radius = am4core.percent(0);

    //PieChart2 --------------------------->

    // Create chart instance
    let piechart2 = am4core.create("piechartdiv2", am4charts.PieChart);

    // Add data
    piechart2.data = [
      {
        category: "Aeronautical",
        metadata: 401.9,
      },
      {
        category: "Demarcation",
        metadata: 309.3,
      },
      {
        category: "Built Enviroment",
        metadata: 201.1,
      },
      {
        category: "Hydrography",
        metadata: 115.8,
      },
      {
        category: "General",
        metadata: 139.9,
      },
    ];

    // Add and configure Series
    let pieSeries2 = piechart2.series.push(new am4charts.PieSeries());
    pieSeries2.dataFields.value = "metadata";
    pieSeries2.dataFields.category = "category";
    pieSeries2.slices.template.stroke = am4core.color("#fff");
    pieSeries2.slices.template.strokeOpacity = 1;

    // This creates initial animation
    pieSeries2.hiddenState.properties.opacity = 1;
    pieSeries2.hiddenState.properties.endAngle = -90;
    pieSeries2.hiddenState.properties.startAngle = -90;

    piechart2.hiddenState.properties.radius = am4core.percent(0);
  }

  ngOnDestroy() {
    // Clean up chart when the component is removed
    this.browserOnly(() => {
      if (this.chart) {
        this.chart.dispose();
      }
    });
  }
}
