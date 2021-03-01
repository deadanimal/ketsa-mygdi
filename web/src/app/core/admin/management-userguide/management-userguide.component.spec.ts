import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementUserguideComponent } from './management-userguide.component';

describe('ManagementUserguideComponent', () => {
  let component: ManagementUserguideComponent;
  let fixture: ComponentFixture<ManagementUserguideComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementUserguideComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementUserguideComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
