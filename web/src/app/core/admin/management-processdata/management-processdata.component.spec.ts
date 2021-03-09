import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementProcessdataComponent } from './management-processdata.component';

describe('ManagementProcessdataComponent', () => {
  let component: ManagementProcessdataComponent;
  let fixture: ComponentFixture<ManagementProcessdataComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementProcessdataComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementProcessdataComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
