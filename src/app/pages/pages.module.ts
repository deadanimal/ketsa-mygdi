
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { 
  AccordionModule,
  BsDropdownModule,
  ModalModule,
  ProgressbarModule, 
  TabsModule,
  TooltipModule
} from 'ngx-bootstrap';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { NgxDatatableModule } from '@swimlane/ngx-datatable';
import { LoadingBarModule } from '@ngx-loading-bar/core';
import { CollapseModule } from 'ngx-bootstrap/collapse';

import { RouterModule } from '@angular/router';
import { PagesRoutes } from './pages.routing';
import { HomeComponent } from './home/home.component';
import { PortalComponent } from './portal/portal.component';

@NgModule({
  declarations: [HomeComponent,PortalComponent],
  imports: [
    CommonModule,
    CollapseModule.forRoot(),
    AccordionModule.forRoot(),
    BsDatepickerModule.forRoot(),
    BsDropdownModule.forRoot(),
    ModalModule.forRoot(),
    ProgressbarModule.forRoot(),
    TabsModule.forRoot(),
    TooltipModule.forRoot(),
    FormsModule,
    ReactiveFormsModule,
    LoadingBarModule,
    NgxDatatableModule,
    RouterModule.forChild(PagesRoutes)
  ]
})
export class PagesModule { }
