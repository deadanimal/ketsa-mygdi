import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CommonModule } from '@angular/common';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { HttpTokenInterceptor } from './shared/interceptor/http.token.interceptor';
import { BsDropdownModule } from 'ngx-bootstrap';
import { setTheme } from 'ngx-bootstrap/utils';
import { AccordionModule } from 'ngx-bootstrap/accordion';

import { MatExpansionModule} from '@angular/material/expansion';

import { CollapseModule } from 'ngx-bootstrap/collapse';
import { LeafletModule } from '@asymmetrik/ngx-leaflet';
import { TagInputModule } from 'ngx-chips';
import { ToastrModule } from 'ngx-toastr';

import { AppComponent } from './app.component';
import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';
import { AuthLayoutComponent } from './layouts/auth-layout/auth-layout.component';
import { PresentationModule } from './examples/presentation/presentation.module';

import { RouterModule } from '@angular/router';
import { AppRoutingModule } from './app-routing.module';
import { ComponentsModule } from './components/components.module';
import { DashboardComponent } from './dashboard/dashboard.component';
import * as $ from 'jquery';




@NgModule({
  imports: [
    AppRoutingModule,
    BrowserAnimationsModule,
    CommonModule,
    BrowserModule,
    FormsModule,
    AccordionModule.forRoot(),
    HttpClientModule,
    ComponentsModule,
    RouterModule,
    BsDropdownModule.forRoot(),
    CollapseModule.forRoot(),
    TagInputModule,
    ToastrModule.forRoot({
      closeButton: true,
      timeOut: 3000,
      progressBar: true,
      positionClass: 'toast-top-right'
    }),
    LeafletModule,
    PresentationModule,
    MatExpansionModule
  ],
  declarations: [
    AppComponent, 
    AdminLayoutComponent, 
    AuthLayoutComponent, DashboardComponent, 
  ],
  providers: [
    /* Uncomment this to use interceptor
    {
      provide: HTTP_INTERCEPTORS, useClass: HttpTokenInterceptor, multi: true
    }
    */
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}
