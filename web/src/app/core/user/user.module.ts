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
import { UserRoutes } from './user.routing';
import { DashboardComponent } from './dashboard/dashboard.component';
import { MetadataComponent } from './metadata/metadata.component';
import { ProfileComponent } from './profile/profile.component';
import { SemakanComponent } from './semakan/semakan.component';

@NgModule({
  declarations: [DashboardComponent, MetadataComponent, ProfileComponent, SemakanComponent],
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
    RouterModule.forChild(UserRoutes)
  ]
})
export class UserModule { }
