import { ClassSharecategoryComponent } from './management-updatedata/class-sharecategory/class-sharecategory.component';
import { ClassCategoryComponent } from './management-updatedata/class-category/class-category.component';
import { DatalistComponent } from './management-updatedata/datalist/datalist.component';
import { DatapriceComponent } from './management-updatedata/dataprice/dataprice.component';
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
import { QuillModule } from 'ngx-quill';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { NgxDatatableModule } from '@swimlane/ngx-datatable';
import { LoadingBarModule } from '@ngx-loading-bar/core';

import { RouterModule } from '@angular/router';
import { AdminRoutes } from './admin.routing';
import { DashboardComponent } from './dashboard/dashboard.component';
import { ManagementUserComponent } from './management-user/management-user.component';
import { ReportComponent } from './report/report.component';
import { DatatableComponent } from './datatable/datatable.component';
import { ManagementFaqComponent } from './management-faq/management-faq.component';
import { ManagementAnnoucementComponent } from './management-annoucement/management-annoucement.component';
import { ManagementUserguideComponent } from './management-userguide/management-userguide.component';
import { ProfileComponent } from '../admin/profile/profile.component';
import { Placeholder } from '@angular/compiler/src/i18n/i18n_ast';
import { FeedbackComponent } from './feedback/feedback.component';
import { ManagementProcessdataComponent } from './management-processdata/management-processdata.component';
import { ManagementAppstatusComponent } from './management-appstatus/management-appstatus.component';
import { ManagementNewappComponent } from './management-newapp/management-newapp.component';
import { ManagementElementmetadataComponent } from './management-elementmetadata/management-elementmetadata.component';
import { ValuationComponent } from './valuation/valuation.component';
import { ManagementAcceptuserComponent } from './management-acceptuser/management-acceptuser.component';

@NgModule({
  declarations: [
    DashboardComponent,
    ManagementUserComponent,
    ReportComponent,
    DatatableComponent,
    ManagementFaqComponent,
    ManagementAnnoucementComponent,
    ManagementUserguideComponent,
    ProfileComponent,
    FeedbackComponent,
    ManagementProcessdataComponent,
    ManagementAppstatusComponent,
    ManagementNewappComponent,
    ManagementElementmetadataComponent,
    ValuationComponent,
    DatapriceComponent,
    DatalistComponent,
    ClassCategoryComponent,
    ClassSharecategoryComponent,
    ManagementAcceptuserComponent
  ],
  imports: [
    CommonModule,
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
    RouterModule.forChild(AdminRoutes),
    QuillModule.forRoot({
      modules: {
        syntax: false,
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
          ['blockquote', 'code-block'],
      
          [{ 'header': 1 }, { 'header': 2 }],               // custom button values
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
          [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
          [{ 'direction': 'rtl' }],                         // text direction
      
          [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      
          [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
          [{ 'font': [] }],
          [{ 'align': [] }],
      
          ['clean'],                                         // remove formatting button
      
          ['link', 'image', 'video']                         // link and image, video
          
        ]
      },
    })
  ]
})
export class AdminModule { }
