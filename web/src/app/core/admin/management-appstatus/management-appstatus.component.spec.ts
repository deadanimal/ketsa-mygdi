import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementAppstatusComponent } from './management-appstatus.component';

describe('ManagementAppstatusComponent', () => {
  let component: ManagementAppstatusComponent;
  let fixture: ComponentFixture<ManagementAppstatusComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementAppstatusComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementAppstatusComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
