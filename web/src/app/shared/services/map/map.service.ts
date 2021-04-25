import { AfterViewInit, Injectable } from "@angular/core";
import { AsyncSubject, Observable } from "rxjs";
import { Map } from "mapbox-gl";
import { HttpClient } from "@angular/common/http";
import * as mapboxgl from "mapbox-gl";
import { environment } from "src/environments/environment";

@Injectable({
  providedIn: "root",
})
export class MapService {
  
  mapContainer:HTMLElement;
  map = new AsyncSubject<Map>();
  public maps!: mapboxgl.Map;
  style = "mapbox://styles/mapbox/streets-v11";
  lat = 45.899977;
  lng = 6.172652;
  zoom = 12;

  constructor(private http: HttpClient) {
    (mapboxgl as any).accessToken = environment.mapboxKey.accessToken;
  }

  getData(file = 1): Observable<any> {
    return this.http.get<any>(`../../../assets/data.${file}.json`); // Load json file in assets/json/{fileName}
  }

  buildMap() {
    this.mapContainer= (<HTMLElement>document.getElementById('mapbox'));
    this.maps = new mapboxgl.Map({
      container: this.mapContainer,
      style: this.style,
      zoom: this.zoom,
      center: [this.lng, this.lat],
    });
    this.maps.addControl(new mapboxgl.NavigationControl());
  }

}
