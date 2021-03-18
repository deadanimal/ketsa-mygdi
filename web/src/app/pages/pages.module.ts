
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

import { ComponentsModule } from "../components/components.module";
import { RouterModule } from '@angular/router';
import { PagesRoutes } from './pages.routing';
import { HomeComponent } from './home/home.component';
import { PortalComponent } from './portal/portal.component';
import { UserguideComponent } from './userguide/userguide.component';
import { ContactusComponent } from './contactus/contactus.component';
import { FaqComponent } from './faq/faq.component';
import { DataAsasComponent } from './data-asas/data-asas.component';
import { MetadataComponent } from './metadata/metadata.component';
import { TutorialComponent } from './tutorial/tutorial.component';
import { DisclaimerComponent } from './disclaimer/disclaimer.component';
import { PrivacyComponent } from './privacy/privacy.component';
import { MygeointroComponent } from './mygeointro/mygeointro.component';
import { AnnoucementComponent } from './annoucement/annoucement.component';
import { SubAnnoucementComponent } from './sub-annoucement/sub-annoucement.component';

@NgModule({
  declarations: [
    HomeComponent,
    PortalComponent, 
    UserguideComponent, 
    ContactusComponent, 
    FaqComponent, 
    DataAsasComponent, 
    MetadataComponent, 
    TutorialComponent, DisclaimerComponent, PrivacyComponent, MygeointroComponent, AnnoucementComponent, SubAnnoucementComponent,
  ],
  imports: [
    CommonModule,
    ComponentsModule,
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
